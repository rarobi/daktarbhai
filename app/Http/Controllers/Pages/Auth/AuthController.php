<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\ApiListController;
use App\Http\Requests\Pages\EmailRequest;
use App\Http\Requests\Pages\SigninRequest;
use App\Http\Requests\Pages\SignupRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cookie;

header("Cache-Control: private, must-revalidate, max-age=0");

class AuthController extends ApiListController
{
    public function accountKitLogin()
    {
        if(Cookie::has('_tn')) {
            return redirect()->route('frontend.profile');
        }
        // Initialize variables
        $app_id = config("misc.web.facebook_app_id");
        $secret = config("misc.web.fb_account_kit_secret");
        $version = config("misc.web.fb_account_kit_version"); // 'v1.1' for example

        // Exchange authorization code for access token
        $token_exchange_url = $this->accountKitAuthInformation($version, $_POST['code'], $app_id , $secret);
        $data = $this->doCurl($token_exchange_url);

        /* TODO : Need to handle the data error properly */
        if(!isset($data['id'])) {
            return redirect()->route("frontend.signin")->with('message',  'Failed to verify mobile number. Please try again');
        }

        $record['provider_id']      = $data['id'];
        $record['access_token']     = $data['access_token'];
        $record['refresh_interval'] = $data['token_refresh_interval_sec'];

        $me_endpoint_url = $this->accountKitInformation($record['access_token'], $version);
        $data = $this->doCurl($me_endpoint_url);

        $record['phone']    = isset($data['phone']) ? $data['phone']['number'] : '';
        $record['email']    = isset($data['email']) ? $data['email']['address'] : '';
        $record['provider'] = 'facebook';
//        $record['verified_number']  =   isset($data['phone']) ?true:false;
        $url =  $this->accountKitRegisterUserUrl();
        $result = $this->postDataFromApi($url, $record);

        if($result->status_code == 200) {
            $user    = $result->user;
            $redirectInfo    =   $this->setUserCookie($user);
            $url    =   $redirectInfo['url'];
            $cookie =   $redirectInfo['cookie'];
            if($user->is_password_set) {
                $success = "Welcome to Daktarbhai. ";
            } else {
                $success = "Welcome to Daktarbhai. Please set your <a href=".url('profile/add-password').">password</a> ";
            }
            return redirect()->to($url)->with('success',$success)->cookie($cookie);
        } else {
            return redirect()->route("frontend.signin")->with('message',  'Failed to verify mobile number');
        }
    }

// Method to send Get request to url
    private function doCurl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $data;
    }

    public function loginForm()
    {
//        if(Session::has('access_token')) {
        if(Cookie::has('_tn')) {
            return redirect()->route('frontend.profile');
        }

        return view('frontend.pages.auth.login');
    }


    /**
     * @param SignupRequest $request
     * @return mixed
     */
    public function register(SignupRequest $request)
    {
        if($request->has('code_reg') && $request->input('code_reg') != null) {
            return redirect()->route('frontend.signin');
        }


        $url        = $this->postUserRegister();
        $request    = $request->except('_token');
        $request['api_key'] = config('misc.app_auth.app_key');
        $request['api_secret'] = config('misc.app_auth.app_secret');;

        $result     = $this->postDataFromApi($url, $request);
//        dd($result);
        if($result != null && $result->registration_status == false) {
            $message = $result->status;
            return redirect()->route('frontend.signin')->withInput()->with(compact('message'));
//            return redirect()->route('frontend.signin')->withInput()->with(compact('message', 'activeReg'));
        } else if($result->status_code == 500) {
            abort(500);
        }  else {
            $user    = $result->user;
        }
        $success = 'Welcome to Daktarbhai.Please Verify your email address by clicking the verification link sent to your email address';

        $cookie = cookie('_tn', encrypt($result->user->access_token), 3600);

        // putting user data into session
        session(['user' => encrypt($user)]);

        $url = Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo();

        return redirect()->to($url)->with('success',$success)->cookie($cookie);
    }

    public function login(SigninRequest $request)
    {
        $request    = $request->except('_token');
        $request['email'] =   trim($request['email_phone']);
        if(filter_var($request['email'], FILTER_VALIDATE_EMAIL) || substr( $request['email'], 0, 1 ) === '+')
        {
            $input['email_phone'] = trim($request['email_phone']);
        } else {
            $input['membership_id'] = trim($request['email_phone']);
        }
        $input['password']  = $request['password'];
        $url        = $this->postUserSignin();
        $result     = $this->postDataFromApi($url, $input);

        if(isset($result->login_status) && $result->login_status == false) {
            $message = $result->status;
            return redirect()->route('frontend.signin')->withInput()->with(compact('message'));
        } else if($result->status_code == 500) {
            abort(500);
        } else if($result->status_code == 404){
            abort(404);
        } else {
            $user    = $result->user;
            $message = 'success your login';
//            session(['access_token'=> encrypt($result->user->access_token)]);
            $cookie = cookie('_tn', encrypt($result->user->access_token), 3600);;

            session(['user' => encrypt($user)]);

            $url = Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo();

            if(session('backUrl')) {
                Session::forget('backUrl');
            }

            return redirect()->to($url)->cookie($cookie);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resetPasswordForm()
    {
//        if(Session::has('access_token')) {
        if(Cookie::has('_tn')) {
            return redirect()->route('frontend.profile');
        }
        return view('frontend.pages.auth.reset-password');
    }

    //public function resetPassword(EmailRequest $request)
    public function resetPassword(Request $request)
    {
        $request['email_username'] =   trim($request['email_username']);
        if(filter_var($request['email_username'], FILTER_VALIDATE_EMAIL))
        {
            $input['email'] = trim($request['email_username']);
        } else {
            $input['membership_id'] = trim($request['email_username']);
        }

        $url = $this->postResetPassword();
        $result = $this->postDataFromApi($url, $input);

        if($result != null && $result->status_code == 200) {
            $success = isset($result->message) ? $result->message : 'Recovery password send to your email address';
            return back()->withInput()->with(compact('success'));
        } else if($result->status_code == 500) {
            abort(500);
        }  else {
            $error = isset($result->error) ? $result->error : 'There is some technical problem';
            return back()->withInput()->with(compact('error'));
        }
    }

    /**
     * @return mixed
     */
    public function logout()
    {
//        Session::flush();
//        Cookie::queue(Cookie::forget('_tn'));

        //user logout vai calling API
        $user = decrypt(session('user'));

        $url    = $this->postUserSignout();
        $params = [
            'api_token' => $user->access_token,
            'platform' => 'web'
        ];

        $result = $this->postDataFromApi($url, $params);

        if($result != null && $result->status_code == 200) {
            Session::flush();
            Cookie::queue(Cookie::forget('_tn'));
            return redirect()->route("frontend.signin")->with('success',  'You have successfully Logged out');
        } else {
            return redirect()->back()->with('error',  'Somethig went wrong. Please try again');
        }
    }

    /*public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo;
    }*/

    private function redirectTo()
    {
        return url('/').'/'.'profile';
    }

    private function setUserCookie($user) {
        $cookie = cookie('_tn', encrypt($user->access_token), 3600);

        session(['user' => encrypt($user)]);

        $url = Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo();

        if(session('backUrl')) {
            Session::forget('backUrl');
        }
        return ['url'=>$url,'cookie'=>$cookie];
    }

    public function getEmailVerificationStatus(Request $request) {
        $data    =   $request->except('_token');
        $url  =  $this->getVerifiedEmailStatus();
        $result =   $this->getQueryArticleListDataApi($url, $data);

        if($result != null && $result->status_code == 200) {
            return json_encode(1);
        } else {
            return json_encode(0);
        }

    }


    public function getEmailConfirmation(Request $request, $confirmationCode) {

        if( ! $confirmationCode)
        {
            throw new \Exception();
        }
        $data['email']    =   $request->input('email');
        $data['email_verification_code']    =   $confirmationCode;

        $url  =  $this->verifyUserEmailAddress();
        $result =   $this->postDataFromApi($url, $data);

        if($result != null && $result->status_code == 200) {
            $cookie = cookie('_tn', encrypt($result->user->access_token), 3600);;
            $user    = $result->user;
            session(['user' => encrypt($user)]);

            $url = Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo();

            if(session('backUrl')) {
                Session::forget('backUrl');
            }
            $success ='Successfully verified email address';
            return redirect()->to($url)->with(compact('success'))->cookie($cookie);

        } else if($result->status_code == 500) {
            abort(500);
        }  else {
            $error = isset($result->error) ? $result->error->message : 'There are some technical problem';
            return back()->withInput()->with(compact('error'));
        }

    }

    public function isUserLoggedIn(Request $request) {
        if(Cookie::has('_tn')) {
            return 1;
        } else {
            return 0;
        }
    }

    public function generateOtp(Request $request){
        $url        = $this->otpGenerateURL();

//        \Log::info($url);
        $input['api_key']           = 'BUFWICFGGNILMSLIYUVE';
        $input['api_secret']        = 'WZENOMMJPOKHYOMJSPOGZNAGMPAEZDMLNVXGMTVH';
        $input['platform']          = 'web';
        $input['activity']          = 'login';
        $mobile                     = $request->input('mobile');
        $input['mobile']            = "+880".substr($mobile, -10, 10);
        $result = $this->postDataFromApi($url, $input);
        \Log::info(json_encode($result));
        \Log::info(request()->server('SERVER_ADDR'));
        if($result->status_code == 400) {
//            return redirect('/signin');
            return response()->json($result);

        }

    }

    public  function verifyOtp(Request $request){
        $url        = $this->otpVerifyURL();

        $input['api_key']           = 'BUFWICFGGNILMSLIYUVE';
        $input['api_secret']        = 'WZENOMMJPOKHYOMJSPOGZNAGMPAEZDMLNVXGMTVH';
        $input['platform']          = 'web';
        $input['mobile']            = "+880".substr($request->mobile_number, -10, 10);
        $input['otp_code']          = $request->otp;


        $result = $this->postDataFromApi($url, $input);

        if( $result != null && $result->status_code == 200) {

            $mobileloginUrl        = $this->mobileLogin();

            $input['provider_id']     = '16643';
            $input['provider']        = 'banglalink';
            $input['access_token']    = 'BLbArimMashB165pTyNN8cZCMxGAvJVyqN8SJ';
            $input['phone']           = "+880".substr($request->mobile_number, -10, 10);

            $result = $this->postDataFromApi($mobileloginUrl, $input);
            if( $result != null && $result->status_code == 200) {
                $user    = $result->user;
                $redirectInfo    =   $this->setUserCookie($user);
                $url    =   $redirectInfo['url'];
                $cookie =   $redirectInfo['cookie'];
                if($user->is_password_set) {
                    $success = "Welcome to Daktarbhai. ";
                } else {
                    $success = "Welcome to Daktarbhai. Please set your <a href=".url('profile/add-password').">password</a> ";
                }
                return redirect()->to($url)->with('success',$success)->cookie($cookie);
            } elseif ($result->status_code == 400){
                return redirect('/signin');
            } else {
                $error = isset($result->error->message) ? $result->error->message : 'Some technical problem';

                return redirect('/profile')->with(compact('error'));
            }

        } elseif ($result->status_code == 400){
            return redirect('/signin');
        } else {
            $error = isset($result->error->message) ? $result->error->message : 'Some technical problem';
            return redirect('/profile')->with(compact('error'));
        }
    }

    /**
     * Verify otp in ask a doctor login page
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public  function verifyOtpInAskDoctor(Request $request){

        $url        = $this->otpVerifyURL();

        $input['api_key']           = 'BUFWICFGGNILMSLIYUVH';
        $input['api_secret']        = 'WZENOMMJPOKHYOMJSPOGZNAGMPAEZDMLNVXGMTVE';
        $input['platform']          = 'web';
        $input['mobile']            = "+880".substr($request->mobile_number, -10, 10);
        $input['otp_code']          = $request->otp;


        $result = $this->postDataFromApi($url, $input);
//dd($result);
        if( $result != null && $result->status_code == 200) {

            $mobileloginUrl        = $this->mobileLogin();

            $input['provider_id']     = '16643';
            $input['provider']        = 'banglalink';
            $input['access_token']    = 'BLbArimMashB165pTyNN8cZCMxGAvJVyqN8SJ';
            $input['phone']           = "+880".substr($request->mobile_number, -10, 10);

            $result = $this->postDataFromApi($mobileloginUrl, $input);
//            dd($result);
            if( $result != null && $result->status_code == 200) {
                $user    = $result->user;
//                $redirectInfo    =   $this->setUserCookie($user);
//                $url    =   $redirectInfo['url'];
//                $cookie =   $redirectInfo['cookie'];
//                if($user->is_password_set) {
//                    $success = "Welcome to Daktarbhai. ";
//                } else {
//                    $success = "Welcome to Daktarbhai. Please set your <a href=".url('profile/add-password').">password</a> ";
//                }
//                return redirect()->to($url)->with('success',$success)->cookie($cookie);
                $cookie = cookie('_tn', encrypt($result->user->access_token), 3600);;

                session(['user' => encrypt($user)]);

                $url = Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo();

                if(session('backUrl')) {
                    Session::forget('backUrl');
                }

                return redirect()->to($url)->cookie($cookie);

            } elseif ($result->status_code == 400){
                return redirect('/ask-a-doctor');
            } else {
                $error = isset($result->error->message) ? $result->error->message : 'Some technical problem';

                return redirect('/ask-a-doctor')->with(compact('error'));
            }

        } elseif ($result->status_code == 400){
            return redirect('/ask-a-doctor');
        } else {
            $error = isset($result->error->message) ? $result->error->message : 'Some technical problem';
            return redirect('/ask-a-doctor')->with(compact('error'));
        }
    }
}
