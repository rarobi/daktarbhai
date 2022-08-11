<?php

namespace App\Http\Controllers\Pages\Profile;

use App\Http\Controllers\ApiAuthenticatedListController;
use App\Http\Requests\Pages\AddPasswordRequest;
use App\Http\Requests\Pages\ChangePasswordRequest;
use App\Http\Requests\Pages\ProfileUpdateRequest;
use App\Services\DownloadPdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;
use Session;

class ProfileController extends ApiAuthenticatedListController
{
    //
    use DownloadPdf;
    protected $limit;

    public function __construct()
    {
        parent::__construct();
        $this->limit = 10;
    }

    private function getAuthenticatedUser()
    {
          if(session('user')) {
              $user = decrypt(session('user'));
          } else {
              $myProfileUrl = $this->getProfileInfoApi();
              $params                        = [
                  'api_token'          => decrypt(\Cookie::get('_tn')) // session('user')->access_token
              ];
              $profileApiResult = $this->getQueryArticleListDataApi($myProfileUrl, $params);

              if(isset($profileApiResult->status_code) && $profileApiResult->status_code == 200) {
                  $user = $profileApiResult->user;
                  session(['user' => encrypt($user)]);
              } else {
                  \Cookie::queue(\Cookie::forget('_tn'));

                  return redirect()->route('frontend.signin');
              }
          }

          return $user;
    }

    public function index()
    {
        Session::forget('user');
        $data['user'] = $this->getAuthenticatedUser();
        return view('frontend.pages.profile.profile', $data);
    }

    public function getAppointmentHistoryPage($page = 1)
    {
      $data['user'] = $this->getAuthenticatedUser();

      $appointmentUrl = $this->getAppointmentHistory();

      $params                        = [
          'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,
          'platform'           => 'web',
          'page'               =>  $page,
          'limit'              => $this->limit
      ];
      $result = $this->getQueryArticleListDataApi($appointmentUrl, $params);

      $data['appointments'] = isset($result->appointments) ? $result->appointments : null;
      $data['rootUrl'] = 'profile/appointment-history';
      $data['appointmentPaginator'] = isset($result->paginator) ? $result->paginator : null;

      return view('frontend.pages.profile.appointment-history', $data);
    }

    public function getDiscountHistoryPage($page = 1)
    {
      $data['user'] = $this->getAuthenticatedUser();


      $discountUrl = $this->getDiscountHistory();

      $params                        = [
          'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,
          'platform'           => 'web',
          'page'               =>  $page,
          'limit'              => $this->limit
      ];
      $result     = $this->getQueryArticleListDataApi($discountUrl, $params);
        /*dd($result);*/
      $data['mydiscounts'] = isset($result->discounts) ? $result->discounts : null;
      /*dd($data);*/
      $data['rootUrl'] = 'profile/discount-history';
      $data['discountPaginator'] = isset($result->paginator) ? $result->paginator : null;

      return view('frontend.pages.profile.discount-history', $data);
    }

    public function getMyQuestionPage($page = 1)
    {
      $data['user'] = $this->getAuthenticatedUser();

      $myQuestionUrl = $this->getMyQuestion();

      $params                        = [
          'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,
          'platform'           => 'web',
          'page'               =>  $page,
          'limit'              => $this->limit
      ];

      $result = $this->getQueryArticleListDataApi($myQuestionUrl, $params);

      $data['myQuestions'] = isset($result->askQuestions) ? $result->askQuestions : null;
      $data['questionPaginator'] = isset($result->paginator) ? $result->paginator : null;
      $data['rootUrl'] = 'profile/my-questions';

      return view('frontend.pages.profile.my-questions', $data);
    }

    public function getPrescriptionHistory($page = 1)
    {
        $data['user'] = $this->getAuthenticatedUser();

        $myPrescriptionUrl = $this->getMyPrescription();

        $params                        = [
            'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,
            'platform'           => 'web',
            'page'               =>  $page,
            'limit'              => $this->limit
        ];
        $result = $this->getQueryArticleListDataApi($myPrescriptionUrl, $params);
        $data['myPrescriptions'] = isset($result->patientVital) ? $result->patientVital : null;
//        dd($data['myPrescriptions']);

        $data['rootUrl'] = 'profile/prescription-history';

        return view('frontend.pages.profile.my-prescription', $data);
    }

    public function getPrescriptionHistoryDetails($id)
    {
        $data['user'] = $this->getAuthenticatedUser();

        $myPrescriptionUrl = $this->getMyPrescriptionDetails($id);
        $params                        = [
            'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,
        ];
        $result = $this->getQueryArticleListDataApi($myPrescriptionUrl, $params);

        $data['myPrescription'] = isset($result->patientVital) ? $result->patientVital : null;

        $data['rootUrl'] = 'profile/prescription-history/details/{id}';

        return view('frontend.pages.profile.my-prescription-details', $data);
    }

    public function downloadPrescriptionAsPdf($id) {
        $data['user'] = $this->getAuthenticatedUser();

        $myPrescriptionUrl = $this->getMyPrescriptionDetails($id);

        $params                        = [
            'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,
        ];
        $result = $this->getQueryArticleListDataApi($myPrescriptionUrl, $params);

        $data['myPrescription'] = isset($result->patientVital) ? $result->patientVital : null;

        $data['rootUrl'] = 'profile/prescription/download/{id}';

        $date = Carbon::parse($data['myPrescription']->prescription_date)->format('j F Y');
        $currentTime = Carbon::now();

        $mpdf = new mPDF([
            'tempDir' => storage_path('app/public/prescription'),
            'utf-8', // mode - default ''
            'A4', // format - A4, for example, default ''
            12, // font size - default 0
            'SolaimanLipi', // default font family
            10, // margin_left
            10, // margin right
            10, // margin top
            15, // margin bottom
            10, // margin header
            9, // margin footer
            'P'
        ]);

        $contents = view('frontend.pages.profile.my-prescription-pdf', $data)->render();

        $mpdf->Bookmark('Start of the document');
        $mpdf->useSubstitutions;
        $mpdf->SetProtection(array('print'));
        $mpdf->SetDefaultBodyCSS('color', '#000');
        $mpdf->SetTitle("Tele-Medicine Prescription");
        $mpdf->SetSubject("Prescription");
        $mpdf->SetAuthor("Daktarbhai");
        $mpdf->autoScriptToLang = true;
        $mpdf->baseScript = 1;
        $mpdf->autoVietnamese = true;
        $mpdf->autoArabic = true;

        $mpdf->autoLangToFont = true;
        $mpdf->SetDisplayMode('fullwidth');
        $mpdf->setFooter('{PAGENO} / {nb}');
        $stylesheet = file_get_contents('assets/css/prescriptionPDF.css');
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($contents, 2);

        $mpdf->defaultfooterfontsize = 10;
        $mpdf->defaultfooterfontstyle = 'B';
        $mpdf->defaultfooterline = 0;
        $mpdf->SetFont('SolaimanLipi');
//        $mpdf->WriteHTML($stylesheet);
        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);

        $mpdf->SetCompression(true);
        $mpdf->Output($currentTime . '.pdf', 'D');
    }
    
    public function getChangePasswordPage()
    {
        $data['user'] = $this->getAuthenticatedUser();
        return view('frontend.pages.profile.change-password', $data);
    }

    public function getAddPasswordPage()
    {
        $data['user'] = $this->getAuthenticatedUser();
        return view('frontend.pages.profile.add-password', $data);
    }

    public function getProfileUpdatePage()
    {
        $data['user'] = $this->getAuthenticatedUser();

        return view('frontend.pages.profile.profile-update-form', $data);
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $input['api_token'] = decrypt(\Cookie::get('_tn')); // session('user')->access_token;

        $input['name']              = strip_tags($request->name);
        $input['gender']            = strip_tags($request->gender);
        $input['division_name']     = strip_tags($request->division_name);
        $input['blood_group']       = strip_tags($request->blood_group);
        $input['date_of_birth']     = $request->date_of_birth != null ? strip_tags($request->date_of_birth) : '';
        $input['nid']               = $request->nid != null ? strip_tags($request->nid) : '';

        $input['mobile']            = $request->mobile != null ? strip_tags($request->mobile) : '';
        $input['email']             = $request->email != null ? strip_tags($request->email) : '';
        $input['password']          = $request->password != null ? bcrypt(strip_tags($request->password)) : '';

        $url = $this->postProfileUpdateApi();
        $result = $this->postDataFromApi($url, $input);

        if( $result != null && $result->status_code == 200) {
            $data['user'] = $result->user;

            Session::forget('user');
            session(['user' => encrypt($data['user'])]);

            $success = 'Your Profile is successfully updated';

            return redirect('/profile')->with(compact('success'));

        } else if($result->status_code == 500){
            abort(500);

        } else {
            $error = isset($result->error->message) ? $result->error->message : 'Some technical problem';

            return redirect('/profile')->with(compact('error'));
        }

    }

    public function changeProfileImage(Request $request)
    {
        $input['api_token'] = decrypt(\Cookie::get('_tn')); // session('user')->access_token;
        $input['profile_photo'] = $_FILES["image_path"];

        $url        = $this->postProfileImageUpdateApi();
        $result     = $this->multipartFromDataApi($url, $input);

        if( $result != null && $result->status_code == 200) {
            Session::forget('user');
            $data['user'] = $this->getAuthenticatedUser();
            session(['user' => encrypt($data['user'])]);
        } else if($result->status_code == 500){
            abort(500);
        } else {
            $error = isset($result->error->message) ? $result->error->message : 'Some technical problem';
            return redirect('/profile')->with(compact('error'));
        }
    }

    public function getSubscriptionHistoryPage(Request $request, $page = 1) {

        if($request->has('status') || session('status')) {
            Session::forget('user');
        }

        $data['user'] = $this->getAuthenticatedUser();

        $subscriptionHistoryUrl = $this->getMySubscriptionHistory();
        $status =   1;
        if($request->has('type')) {
            if($request->input('type') == strtolower('active')) {
                $status   =   1;
            } elseif($request->input('type') == strtolower('all')) {
                unset($status);
            } elseif($request->input('type') == strtolower('inactive')) {
                $status   =   0;
            }
        }

        $params                        = [
            'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,
            'platform'           => 'web',
            'page'               =>  $page,
            'limit'              =>  10
        ];


        // all history

        $allSubscriptions = $this->getQueryArticleListDataApi($subscriptionHistoryUrl, $params);

        $data['subscriptionHistory']['all'] = (isset($allSubscriptions->subscription_history) && (count((array)$allSubscriptions->subscription_history)>0)) ? $allSubscriptions->subscription_history : null;
        $data['subPaginator'] = isset($allSubscriptions->paginator) ? $allSubscriptions->paginator : null;

        if(isset($status)) {
            $params += ['status'=>  $status];
        }

        // active plans
        unset($params['limit']);
        $activeSubscriptions = $this->getQueryArticleListDataApi($subscriptionHistoryUrl, $params);
        $data['subscriptionHistory']['active'] = (isset($activeSubscriptions->subscription_history) && (count((array)$activeSubscriptions->subscription_history)>0)) ? $activeSubscriptions->subscription_history : null;

        $data['rootUrl'] = 'profile/subscription-history';

        if($request->has('status')) {
            $subStatus =   trim($request->input('status'));
            if($subStatus == 'success') {
                $message =  'You\'ve successfully subscribe to Daktarbhai ';

            } else {
//                $message =  'Failed to subscribe to Daktarbhai';
                $message =  $request->input('message');
            }
            $data['status'] =   $message;
            return view('frontend.pages.profile.subscription-history', $data);
        } else {
            $data['status'] =  session('status');
        }

        return view('frontend.pages.profile.subscription-history', $data);
    }

    public function getSubscriptionHistoryDetails(Request $request, $subHisId) {


        $data['user'] = $this->getAuthenticatedUser();

        $subscriptionHistoryUrl = $this->getMySubscriptionHistoryDetail($subHisId);

        $params                        = [
            'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,
        ];
        $result = $this->getQueryArticleListDataApi($subscriptionHistoryUrl, $params);


        $data['subscriptionHistory'] = isset($result->subscription_history) ? $result->subscription_history : null;

        return response()->json($data['subscriptionHistory']);
    }

    public function getSubscriptionInvoiceDetails($subHisId) {

        $data['user'] = $this->getAuthenticatedUser();

        $subscriptionHistoryUrl = $this->getMySubscriptionHistoryDetail($subHisId);

        $params                        = [
            'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,
        ];
        $result = $this->getQueryArticleListDataApi($subscriptionHistoryUrl, $params);


        if($result->status_code == 400 ) {
            return redirect()->route('frontend.subscription.history')->with('error','Subscription history not found');
        }
        $data['subHisId'] = $subHisId;
        $data['subscriptionHistory'] = isset($result->subscription_history) ? $result->subscription_history : null;
        return view('frontend.pages.profile.subscription-invoice', $data);
    }

    public function downloadInvoiceDetails($subHisId) {

        try {
            $data['user'] = $this->getAuthenticatedUser();

            $subscriptionHistoryUrl = $this->getMySubscriptionHistoryDetail($subHisId);

            $params                        = [
                'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,
            ];

            $invoiceInformation = $this->downloadSubscriptionInvoiceDetails($data['user'], $subscriptionHistoryUrl, $params);

            if(count($invoiceInformation) > 0) {
                $pdf = \PDF::loadView('frontend.pages.subscription.invoice.create', $invoiceInformation);
                return $pdf->download($invoiceInformation['invoice_name']);

            }
        } catch(\Exception $e){
            $data['status_code'] = 400;
            $data['status'] = 'failed';
            $data['message']    =  'failed to download invoice';
            return response()->json($data);
        }


    }

    public function invoiceReport($subHisId) {
//dd(1);
        try {
            $data['user'] = $this->getAuthenticatedUser();


            $subscriptionHistoryUrl = $this->getMySubscriptionHistoryDetail($subHisId);

            $params                        = [
                'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,
            ];

            $result = $this->getQueryArticleListDataApi($subscriptionHistoryUrl, $params);

            $data['invoiceInformation'] = isset($result->subscription_history) ? $result->subscription_history : null;
//            dd($result);

            return view('frontend.pages.profile.subscription-invoice-report', $data);

        } catch(\Exception $e){
            $data['status_code'] = 400;
            $data['status'] = 'failed';
            $data['message']    =  'failed to show invoice';
            return response()->json($data);
        }


    }
    /**
     * @param ChangePasswordRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $input['current_password'] = $request->current_password;
        $input['new_password'] = $request->new_password;
        $input['confirm_password'] = $request->confirm_password;
        $input['api_token'] = decrypt(\Cookie::get('_tn')); // session('user')->access_token;

        $url = $this->postProfileChangePasswordApi();
        $result = $this->postDataFromApi($url, $input);

        $password = 'active_password_tab';

        if($result == null || $result->status_code == 500) {
            abort(500);

        } else if($result->status_code == 200) {
            $success = 'Password is successfully updated';

            return redirect('/profile')->with(compact('success','password'));

        } else {
            $error = isset($result->error) ? $result->error : 'some technical problem';

            return redirect()->back()->with(compact('error','password'));
        }


    }

    public function addPassword(AddPasswordRequest $request)
    {
        $input['new_password'] = $request->new_password;
        $input['confirm_password'] = $request->confirm_password;
        $input['api_token'] = decrypt(\Cookie::get('_tn')); // session('user')->access_token;

        $url = $this->postProfileAddPasswordApi();
        $result = $this->postDataFromApi($url, $input);

        $password = 'active_password_tab';

        if($result == null || $result->status_code == 500) {
            abort(500);

        } else if($result->status_code == 200) {
            $success = 'Password is successfully added';
            Session::forget('user');
            $data['user'] = $this->getAuthenticatedUser();
            session(['user' => encrypt($data['user'])]);

            return redirect('/profile')->with(compact('success','password'));

        } else {
            $error = isset($result->error) ? $result->error : 'some technical problem';

            return redirect()->back()->with(compact('error','password'));
        }


    }

    //get verification mobile fron user
    public function getVerifiedMobile(Request $request) {
        $app_id = config("misc.web.facebook_app_id");
        $secret = config("misc.web.fb_account_kit_secret");
        $version = config("misc.web.fb_account_kit_version"); // 'v1.1' for example

        // Exchange authorization code for access token
        $token_exchange_url = $this->accountKitAuthInformation($version, $_POST['code'], $app_id , $secret);
        $data = $this->doCurl($token_exchange_url);

        $record['token']    = $data['access_token'];

        $me_endpoint_url = $this->accountKitInformation($record['token'], $version);
        $data = $this->doCurl($me_endpoint_url);

        $input['mobile']    = isset($data['phone']) ? $data['phone']['number'] : '';
        $input['api_token'] = decrypt(\Cookie::get('_tn')); // session('user')->access_token;
        $user   =   $this->getAuthenticatedUser();

        $url = $this->getUserWithMobile();
        $params =  [
            'mobile' => $input['mobile'],
            'user_id'   =>  $user->user_id
        ];
        $userExist  =   $this->postDataFromApi($url, $params);

        if ($userExist->status_code == 200) {

            $url = $this->postMobileUpdateApi();
            $result = $this->postDataFromApi($url, $input);

            if( $result != null && $result->status_code == 200) {
                $this->updateUserCookie($result->user);
                $success = 'Profile is successfully updated';

                return redirect('/profile')->with(compact('success'));

            } else if($result->status_code == 500){
                abort(500);

            } else {
                $error = isset($result->error->message) ? $result->error->message : 'Some technical problem';

                return redirect('/profile')->with(compact('error'));
            }
        } else {
            $error = 'Sorry, this mobile number has already been taken. Please try with another mobile number.';
            return redirect('/profile')->with(compact('error'));
        }


    }

    // send email verification url to email
    public function sendEmailVerificationUrl(Request $request) {


        $data['api_token']    =   $this->getAuthenticatedUser()->access_token;

        $url  =  $this->sendEmailVerificationApiUrl();
        $result =   $this->postDataFromApi($url, $data);

        if($result != null && $result->status_code == 200) {
            return response()->json(['msg'=>'An email is sent with verification url']);

        } else {
            return response()->json(['msg'=>'Something went wrong. Please refresh your profile']);
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

    private function updateUserCookie($user) {
        Session::forget('user');
        session(['user' => encrypt($user)]);
    }

    public function getSavedBookmarks()
    {
        $data['user'] = $this->getAuthenticatedUser();
        $type = 'blog';
        $myQuestionUrl = $this->userReactionApiUrl($type);

        $params                        = [
            'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,

        ];
        $result = $this->getQueryArticleListDataApi($myQuestionUrl, $params);

//        dd($result);
        $data['savedBlogs'] = isset($result->blog) ? $result->blog : null;
        $data['rootUrl'] = 'profile/saved-bookmarks';

        return view('frontend.pages.profile.saved-blogs', $data);
    }

    private function getInvoiceName($user, $invoicesInformation) {
//        dd($user->username);
        if(isset($user->name)) {
            $name = str_slug($user->name);
        }else {
            $name = $user->username;
        }
        if(isset($invoicesInformation->plan_name)) {
            $plan = $invoicesInformation->plan_name;
        } else {
            $plan = 'Not_Provided';
        }
        $invoicesName = $name.'_'.$plan.'.pdf';
        return $invoicesName;
    }

    public function addEmailForm() {
        return view('frontend.pages.profile.add-email');
    }

    public function verifyEmail(Request $request){

        $data['api_token']    =   $this->getAuthenticatedUser()->access_token;
        $data['email']        =   strip_tags($request->get('email'));
        $url    =  $this->sendEmailVerificationCodeApiUrl();
        $result =  $this->patchDataFromApi($url, $data);

        $message = 'Success';
        if($result->status_code != 200)
            $message = "This email has already existed";

        return response()->json([
            'status_code' => $result->status_code,
            'message' => $message
//            'message' => $result->error->message
        ]);
    }

    public function changeEmail($email){
        return view('frontend.pages.profile.change-email',compact('email'));
    }

    public function updateEmailPassword(Request $request){
        $otpData['api_token']    =   $this->getAuthenticatedUser()->access_token;
        $otpData['verification_code']    =   $request->get('email_verification_code');

        $url  =  $this->confirmEmailVerificationCodeApiUrl();
        $otpResult =   $this->patchDataFromApi($url, $otpData);

        $message = "Success email validated";
        if($otpResult != null && $otpResult->status_code == 200) {
            $passwordData['api_token']    =   $this->getAuthenticatedUser()->access_token;
            $passwordData['new_password']    =   $request->get('new_password');
            $passwordData['confirm_password']    =   $request->get('confirm_password');
            $passwordData['verification_code']    =   $request->get('email_verification_code');

            $url  =  $this->changePasswordApiUrl();
            $passwordSetResult =   $this->postDataFromApi($url, $passwordData);

            if($passwordSetResult != null && $passwordSetResult->status_code == 200) {
                if($passwordData['new_password'] !==$passwordData['confirm_password'])
                    $message = 'Sorry, New password and confirm password don`t macthed.';
            }

        } else {
            $message = 'Sorry, Email Validation Code Not Valid.';
        }

        return response()->json([
            'status_code' => $otpResult->status_code,
            'message' => $message
        ]);
    }

    public function generateOtp(Request $request){
        $url        = $this->otpGenerateURL();

        $input['api_key']           = 'BUFWICFGGNILMSLIYUVH';
        $input['api_secret']        = 'WZENOMMJPOKHYOMJSPOGZNAGMPAEZDMLNVXGMTVE';
        $input['platform']          = 'web';
        $input['activity']          = 'login';
        $mobile                     = $request->input('mobile');
        $input['mobile']            = "+880".substr($mobile, -10, 10);
//        dd($input['mobile']);
        $result = $this->postDataFromApi($url, $input);
        if($result->status_code == 400) {
            return redirect('/profile');
        }

    }

    public  function verifyOtp(Request $request){
        $url        = $this->otpVerifyURL();

        $input['api_key']           = 'BUFWICFGGNILMSLIYUVH';
        $input['api_secret']        = 'WZENOMMJPOKHYOMJSPOGZNAGMPAEZDMLNVXGMTVE';
        $input['platform']          = 'web';
        $input['mobile']            = "+880".substr($request->mobile_number, -10, 10);
        $input['otp_code']          = $request->otp;

        $result = $this->postDataFromApi($url, $input);
        if( $result != null && $result->status_code == 200) {
            if(session('user')) {
                $user = decrypt(session('user'));
            }

            $data['api_token'] = decrypt(\Cookie::get('_tn')); // session('user')->access_token;
            $data['name']                = $user->name;
            $data['mobile']              = $input['mobile'];
            $data['mobile_verified']     = 1;
            $url = $this->postProfileUpdateApi();
            $result = $this->postDataFromApi($url, $data);

            if( $result != null && $result->status_code == 200) {
                $success = 'Your mobile number is successfully verified';

                return redirect('/profile')->with(compact('success'));
            }

        } elseif ($result->status_code == 400){
            return redirect('/profile');
        } else {
            $error = isset($result->error->message) ? $result->error->message : 'Some technical problem';
            return redirect('/profile')->with(compact('error'));
        }
    }


}
