<?php

namespace App\Http\Controllers\Pages;

use App\Http\Requests\Pages\ContactRequest;
use App\Http\Requests\Pages\EmailRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiListController;

class PagesController extends ApiListController
{

    /**
     * @return \Illuminate\View\View
     */
    public function home(Request $request)
    {
        $page = 1; // page 1 for showing the latest articles
        $limit = 4; // we are showing latest 6 articles in the homepage

        $data = [];

        $blogApiUrl = $this->getBlogArticleDataWithPagination($page, $limit);
        $articles = $this->getDataFromApi($blogApiUrl);

        if ($articles != null && isset($articles->blogs) && count($articles->blogs)) {
            $data['articles'] = $articles->blogs;
        }

//        $questionApiUrl = $this->getFeaturedQuestions();
//        $questions = $this->getDataFromApi($questionApiUrl);
//
//        if ($questions != null && isset($questions->askQuestions) && count($questions->askQuestions)) {
//            $data['questions'] = $questions->askQuestions;
//        }

//        $healthTipsApiUrl = $this->getHealthTipsDataWithPagination($page, 3);
//        $healthTips = $this->getDataFromApi($healthTipsApiUrl);
//
//        if ($healthTips != null && isset($healthTips->health_tips) && count($healthTips->health_tips)) {
//            $data['healthTips'] = $healthTips->health_tips;
//        }
//        $url = $this->getHospitalListApi();
//        $params = [
//            'district' => 'dhaka',
//            'display' => 'show_panel',
//            'platform' => 'web',
//            'limit' => 5,
//            'request_from' => 'home'
//        ];
//        $result = $this->getQueryArticleListDataApi($url, $params);
//
//        if ($result != null && isset($result->hospitals) && count($result->hospitals)) {
//            $data['panelHospitals'] = $result->hospitals;
//        }
//
//        $url = $this->getHealthDirectoryData('healthy-living');
//        $params = [
//            'district' => 'dhaka',
//            'limit' => 4,
//            'platform' => 'web',
//        ];
//        $result = $this->getQueryArticleListDataApi($url, $params);
//
//        if ($result != null && isset($result->healthy_livings) && count($result->healthy_livings)) {
//            $data['healthy_livings'] = $result->healthy_livings;
//        }

        $url = $this->getVideoBlogs();
        $videoBlogs = $this->getDataFromApi($url);

        if ($videoBlogs != null && isset($videoBlogs->video_blogs) && count($videoBlogs->video_blogs)) {
            $data['video_blogs'] = $videoBlogs->video_blogs;
        }
//        dd($data);

        $data['isBlUser']     = false;
        $data['isSubscribed'] = false;
        if (session('user')) {
            $user = decrypt(session('user'));
            $data['isSubscribed'] = $user->is_subscribed;
            $user_mobile = $user->mobile;
            if ($user_mobile) {
                $data['isBlUser'] = $this->isBanglalinkNo($user_mobile);
            }
        }

//        $url_for_speciality         = $this->getDoctorSpecialitiesForTeleMedicine();
        $url_for_speciality         = $this->getDoctorSpecialities();
        $data['speciality_list']    = $this->getDataFromApi($url_for_speciality);

        $url_for_district         = $this->getAllDistrict();
        $data['district_list']    = $this->getDataFromApi($url_for_district);
//
//        $data['specialities'] = [];
//
//        if (!is_null($speciality_list) && count($speciality_list->specialities) > 0){
//            foreach ($speciality_list->specialities as $speciality) {
//                $data['specialities'][] = [
//                    'value' => $speciality->name,
//                    'id'    => $speciality->id,
//                    'name'  => $speciality->name,
//                ];
//            }

        return view('frontend.pages.home.index', $data);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('frontend.pages.about');
    }

    public function getPhrInfoPage()
    {
        return view('frontend.pages.phr.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    /**
     * @return string
     */
    public function postContact(ContactRequest $request)
    {
        $url        = $this->postUserFeedback();
        $request    = $request->except('_token','g-recaptcha-response');
//        dd($request);
        $result     = $this->postDataFromApi($url, $request);
        if( $result != null && $result->status_code == 200){
            $success = 'Message successfully sent';
            return redirect()->back()->with(compact('success'));
        } else {
            $error    = 'Oops! An error occured and your message could not be sent.';
            return redirect()->back()->with(compact('error'));
        }

    }

    public function postAskDoctorContact(Request $request)
    {
        $url        = $this->postUserFeedback();
        $request    = $request->except('_token');
        $result     = $this->postDataFromApi($url, $request);
        if($result != null && $result->status_code == 200){
            $data['msg'] = 'Email successfully received. You\'ll be contacted soon.';
            return redirect('services/ask-a-doctor')->with('success',$data['msg']);
        }
        else{
            $data['msg']    = 'Message sent failed';
            return redirect('services/ask-a-doctor')->with('error',$data['msg']);
        }

    }
    public function postPhrContact(EmailRequest $request)
    {
        $url        = $this->postUserFeedback();
        $request    = $request->except('_token');
        $input['email']  = $request['email'];
        $input['feedback_type'] = $request['feedback_type'];
        $result     = $this->postDataFromApi($url, $input);
        if($result != null && $result->status_code == 200){
            $data['msg'] = 'Email successfully received. You\'ll be contacted soon. ';
            return redirect('services/personal-health-report')->with('success',$data['msg']);
        }
        else{
            $data['msg']    = 'Message sent failed';
            return redirect('services/personal-health-report')->with('error',$data['msg']);
        }

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function health_tourism()
    {
        return view('frontend.pages.health-tourism.index');
    }

    public function health_package()
    {
        return view('frontend.pages.health-package.index');
    }

    public function terms()
    {
        return view('frontend.m.terms');
    }

    public function policy()
    {
        return view('frontend.m.privacy-policy');
    }

    public function webTerms()
    {
      return view('frontend.pages.terms');
    }

    public function webPolicy()
    {
      return view('frontend.pages.privacy-policy');
    }

    public function androidManual()
    {
        return view('frontend.m.android-manual');
    }

    public function faq()
    {
        return view('frontend.pages.faq');
    }
    public function healthInsurance()
    {
        return view('frontend.pages.health-insurance.index');
    }
    public function premium()
    {
        return view('frontend.pages.premium.index');
    }

    public function daily_pack()
    {
        return view('frontend.pages.daily-pack.index');
    }

    public function monthly_pack()
    {
        return view('frontend.pages.monthly-pack.index');
    }

    public function yearly_pack()
    {
        return view('frontend.pages.yearly-pack.index');
    }

    /**
     * Test bl number or not
     * @param $phone
     * @return bool
     */
    public function isBanglalinkNo($phone)
    {
        $phonePrefix = substr($phone, -11, 3);
        if ($phonePrefix == '019' || $phonePrefix == '014') {
            return true;
        } else {
            return false;
        }
    }
}
