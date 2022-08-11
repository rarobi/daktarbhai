<?php
/**
 * Created by PhpStorm.
 * User: poddar
 * Date: 2/23/17
 * Time: 1:35 PM
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class ApiListController extends Controller
{
    /*start as blog based api*/

    protected $prefix;
    protected $agentPrefix;

    public function __construct()
    {
        $this->prefix = 'api/v2';
        $this->agentPrefix = 'api/v1';
    }


    /**
     * @param $url
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function getDataFromApi($url)
    {
        $client = new Client();
//        $url = env('API_DOMAIN_URL', url('/')).'/'.$url;
        $url = config("misc.web.api_domain_url").'/'.$url;

        try {
            $res = $client->get(
                $url,
                [
                    'timeout'         => config("misc.web.api_call_timeout"),
                    'headers' => [
                        'User-Agent' => 'Daktarbhai',
                        'Accept' => 'application/json',
                    ]
                ]
            );
            $result = \GuzzleHttp\json_decode($res->getBody());
            return $result;
        } catch (\Exception $e) {
            $data['status_code'] = $e->getCode();
            $data['status']     = 'error';
            $data['messages'] = $e->getMessage();
            $result = response()->json($data);
            return json_decode($result->getContent());
        }
    }

    /**
     * @param $url
     * @param $request
     * @return mixed
     */
    public function postDataFromApi($url, $request)
    {
        $client = new Client();
//        $url = env('API_DOMAIN_URL', url('/')).'/'.$url;
//        $url = config("misc.web.api_domain_url").'/'.$url;
        $url = env('API_DOMAIN_URL', 'https://api.daktarbhai.com').'/'.$url;
//        \Log::info($url);
        try {
            $res = $client->request('POST', $url, ['form_params' => $request]);
            return json_decode($res->getBody()->getContents());
        } catch (\Exception $e) {
            $data['status_code'] = $e->getCode();
            $data['messages'] = $e->getMessage();
            $result = response()->json($data);

            return json_decode($result->getContent());
        }
    }

    /**
     * get data from the agent panel only
     * @param $url
     * @param $request
     * @return mixed
     */
    public function postDataFromAgentApi($url, $request)
    {
        $client = new Client();
//        $url = env('AGENT_DOMAIN_URL', url('/')).'/'.$url;
        $url = config("misc.web.agent_domain_url").'/'.$url;

        try {
            $res = $client->request('POST', $url, ['form_params' => $request]);
            return json_decode($res->getBody()->getContents());
        } catch (\Exception $e) {
            $data['status_code'] = $e->getCode();
            $data['messages'] = $e->getMessage();
            $result = response()->json($data);

            return json_decode($result->getContent());
        }
    }

    public function postDataFromBlinkApi($url, $request)
    {
        $client = new Client();
//        $url = env('BLINK_API_DOMAIN_URL', url('/')).'/'.$url;
        $url = config("misc.web.blink_domain_url").'/'.$url;

        try {
            $res = $client->request('POST', $url, ['form_params' => $request]);
            return json_decode($res->getBody()->getContents());
        } catch (\Exception $e) {
            $data['status_code'] = $e->getCode();
            $data['messages'] = $e->getMessage();
            $result = response()->json($data);

            return json_decode($result->getContent());
        }
    }

    public function patchDataFromApi($url, $request)
    {
        $client = new Client();
//        $url = env('API_DOMAIN_URL', url('/')).'/'.$url;
        $url = config("misc.web.api_domain_url").'/'.$url;

        try {
            $res = $client->request('PATCH', $url, ['form_params' => $request]);
            return json_decode($res->getBody()->getContents());
        } catch (\Exception $e) {
            $data['status_code'] = $e->getCode();
            $data['messages'] = $e->getMessage();
            $result = response()->json($data);

            return json_decode($result->getContent());
        }
    }

    public function multipartFromDataApi($url, $request){
        $client = new Client();
//        $url = env('API_DOMAIN_URL', url('/')).'/'.$url;
        $url = config("misc.web.api_domain_url").'/'.$url;

        try {
            $res = $client->request('POST', $url, [
                'query' => [
                    'api_token' => $request['api_token'],
                ],
                'multipart' => [
                    [
                        'name'     => 'profile_photo',
                        'contents' => fopen($request['profile_photo']['tmp_name'], 'r')
                    ]
                ]
            ]);

            return json_decode($res->getBody()->getContents());
        } catch (\Exception $e) {
            $data['status_code'] = $e->getCode();
            $data['messages'] = $e->getMessage();
            $result = response()->json($data);

            return json_decode($result->getContent());
        }
    }

    public function multipartFromDataApiForMultiImage($url, $multipart_arr){
        $client = new Client();
//        $url = env('API_DOMAIN_URL', url('/')).'/'.$url;
        $url = config("misc.web.api_domain_url").'/'.$url;

        try {
            $res = $client->request('POST', $url, [
                'multipart' => $multipart_arr,
            ]);

            return json_decode($res->getBody()->getContents());
        } catch (\Exception $e) {
            $data['status_code'] = $e->getCode();
            $data['messages'] = $e->getMessage();
            $result = response()->json($data);

            return json_decode($result->getContent());
        }
    }

    /**
     * @param $url
     * @param $request
     * @return mixed
     */
    public function updateDataFromApi($url, $request)
    {
        $client = new Client();
//        $url = env('API_DOMAIN_URL', url('/')).'/'.$url;
        $url = config("misc.web.api_domain_url").'/'.$url;

        try {
            $res = $client->request('PUT', $url, ['form_params' => $request]);
            return json_decode($res->getBody()->getContents());
        } catch (\Exception $e) {
            $data['status_code'] = $e->getCode();
            $data['messages'] = $e->getMessage();
            $result = response()->json($data);

            return json_decode($result->getContent());
        }
    }

    public function destroyDataFromApi($url, $request)
    {
        $client = new Client();
//        $url = env('API_DOMAIN_URL', url('/')).'/'.$url;
        $url = config("misc.web.api_domain_url").'/'.$url;

        try {
            $res = $client->request('DELETE', $url, ['form_params' => $request]);
            return json_decode($res->getBody()->getContents());
        } catch (\Exception $e) {
            $data['status_code'] = $e->getCode();
            $data['messages'] = $e->getMessage();
            $result = response()->json($data);

            return json_decode($result->getContent());
        }
    }


    /*start of get data with Query and params*/

    /**
     * @param $url
     * @param $params
     * @return mixed
     */
    public function getQueryArticleListDataApi($url, $params = null)
    {
        $client = new Client();
//        $url = env('API_DOMAIN_URL', url('/')).'/'.$url;
        $url = config("misc.web.api_domain_url").'/'.$url;

        try {
            $res = $client->request('GET', $url, [
                    'headers' => [
                        'User-Agent' => 'Daktarbhai',
                    ],
                    'query' => $params
                ]
            );
            $result = \GuzzleHttp\json_decode($res->getBody());
            return $result;
        } catch (\Exception $e) {
            $data['status_code'] = $e->getCode();
            $data['status']     = 'error';
            $data['messages'] = $e->getMessage();
            $result = response()->json($data);
            return json_decode($result->getContent());

//            echo 'Exception: ' . $e->getMessage();
        }
    }


    /**
     * method: get
     * API URL : /api/v1/blog
     * @return string
     */
    public function getBlogArticleListDataApi()
    {
        return $this->prefix.'/blog';
    }

    /**
     * API URL : /api/v1/blog/{id}
     * @param $id
     * @return string
     */
    public function getBlogArticleDataApi($id)
    {
        return $this->prefix.'/blog/'.$id;
    }

    /**
     * API URL : /api/v1/blog?page={page}&q=&platform={platform}&limit={limit}
     *
     */
    public function getBlogArticleDataWithPagination($page, $limit, $platform = 'web')
    {
        return $this->prefix.'/blog?page='.$page.'&q=&platform='.$platform.'&limit='.$limit;
    }

    /**
     * API URL : /api/v1/category/{id}/blog
     * @param $id
     * @param $page
     * @param $limit
     * @param string $platform
     * @return string
     */
    public function getBlogArticlesByCategoryApi($id, $page, $limit, $platform = 'web')
    {
        return $this->prefix.'/category/'.$id.'/'.'blog?page='.$page.'&q=&platform='.$platform.'&limit='.$limit;
    }

    /**
     *API URL : /api/v1/blog?q='.$search
     * @param $search
     * @return string
     */
    public function getBlogArticleBySearch($search, $page, $limit, $platform = 'web')
    {

        return $this->prefix.'/blog?page='.$page.'q='.$search.'&platform='.$platform.'&limit='.$limit;

    }

    /*End of blog section*/

    /* Start of Hospital based Api section*/
    /**
     * method: get
     * Api URl: api/v2/hospitals
     * @return string
     */
    public function getHospitalListApi()
    {
        return $this->prefix.'/hospitals';
    }
    /**
     *API URL : api/v1/hospitals'.'/'.$id
     * @param $id
     * @return string
     */
    public function getHospitalDataApi($id)
    {
        return $this->prefix.'/hospitals'.'/'.$id;
    }

    /**
     *API URL : api/v1/pharmacy'.'/'.$id
     * @param $id
     * @return string
     */
    public function getPharmacyDataApi($id)
    {
        return $this->prefix.'/pharmacy/'.$id;
    }

    /**
     * API URL : api/v1/hospitals?latitude'.'='.$latitude.'&'.'longitude'.'='.$longitude
     * @param $latitude
     * @param $longitude
     * @return string
     */
    public function getNearbyHospital($latitude, $longitude)
    {
        return  $this->prefix.'/hospitals?latitude'.'='.$latitude.'&'.'longitude'.'='.$longitude;
    }

    /**
     * @param $input
     * @param $page
     * @param $limit
     * @param string $platform
     * @return string
     */
    public function getHospitallistFiltering($input, $page, $limit, $platform = 'web')
    {
        $division   = isset($input['division_name']) ? $input['division_name'] : '';
        $district   = isset($input['district_name']) ? $input['district_name'] : '';
        $name       = isset($input['hospital_name']) ? $input['hospital_name'] : '';

        return $this->prefix.'/hospitals?division='.$division.'&district='.$district.'&name='.$name.'&page='.$page.'&platform='.$platform.'&limit='.$limit;
    }

    /**
     * @param $type
     * @return string
     */
    public function getHospitalByType($type)
    {
        return $this->prefix.'/hospitals?type'.'='.$type;
    }

    /**
     *API URL : api/v1/hospitals'.'/'.$id.'/'.'doctors
     * @param $id
     * @return string
     */
    public function getDoctorListByHospitalId($id)
    {
        return $this->prefix.'/hospitals'.'/'.$id.'/'.'doctors';
    }
    /* End of Hospital section */

    /* Start of auth section */

    /**
     * API URL : /api/v2/auth/verify-phone-status
     * @return string
     */
    public function getVerifiedEmailStatus()
    {
        return $this->prefix.'/auth/check-availability';
    }
    /**
     * API URL : /api/v1/auth/register
     * @return string
     * @internal param $id
     */
    public function postUserRegister()
    {
        return $this->prefix.'/auth/register';
    }

    public function otpGenerateURL()
    {
//        return $this->prefix.'/otp/generate'; //depricated
        return $this->prefix.'/otp/sent';
    }

    public function otpVerifyURL()
    {
        return $this->prefix.'/otp/verify';
    }

    public function mobileLogin()
    {
        return $this->prefix.'/mobile-login';
    }

    /**
     * API URL : /api/v1/auth/signin
     * @return string
     * @internal param $id
     */
    public function postUserSignin()
    {
        return $this->prefix.'/auth/signin';
    }

    /**
     * API URL : /api/v2/auth/logout
     * @return string
     */
    public function postUserSignout()
    {
        return $this->prefix.'/auth/logout';
    }

    /**
     * api url : $this->prefix.'/auth/password/reset';
     * @return string
     */
    public function postResetPassword()
    {
        return $this->prefix.'/auth/password/reset';
    }
    /* End of Auth section */

    /* Start of doctors section */

    /**
     * method: get
     * api Url : api/v2/doctors
     * @return string
     */
    public function getDoctorListApi()
    {
        return $this->prefix.'/doctors';
    }


    /**
     * method: get
     * api Url : api/v2/doctors/search
     * @return string
     */
    public function getDoctorListSearchApi()
    {
        return $this->prefix.'/doctors/search';
    }


    /**
     * @param $id
     * @return string
     */
    public function getDoctorDataApi($id)
    {
        return $this->prefix.'/doctors'.'/'.$id;
    }
    /**
     * API URL : api/v1/specialities/all
     * @return string
     */
    public function getDoctorSpecialities()
    {
        return $this->prefix.'/specialities';
    }

    /**
     * @return string
     */
    public function getDoctorSpecialitieswithDoctor()
    {
        return $this->prefix.'/specialities?with=doctors';
    }

    /**
     * API URL : api/v1/doctors?category'.'='.$id
     * @param $id
     * @return string
     */
    public function getDoctorBySpeciality($id)
    {
        return $this->prefix.'/doctors?category'.'='.$id;
    }

    /**
     *API URL : api/v1/doctors?division='.$division.'&district='.$district.'&name='.$name
     * @param $input
     * @return string
     */

    public function getDoctorListFiltering($input)
    {
        $division   = isset($input['division_name']) ? $input['division_name'] : '';
        $district   = isset($input['district_name']) ? $input['district_name'] : '';
        $name       = isset($input['doctor_name']) ? $input['doctor_name'] : '';

        return $this->prefix.'/doctors?division='.$division.'&district='.$district.'&name='.$name;
    }

    /**
     * @param $id
     * @param $date
     * @return string
     */
    public function getDoctorScheduleDataApi($id, $date)
    {
        return $this->prefix.'/doctors/info'.'/'.$id.'/'.$date;
    }

    public function postAppointmentConfirm()
    {
        return $this->prefix.'/appointment/store';
    }

    /* End of Doctors List */

    /* Start of Locations based api*/
    /**
     * Api Url : api/v1/location/divisions;
     * @return string
     */

    public function getAllDivision()
    {
        return $this->prefix.'/location/divisions';
    }

    /* Start of Locations based api*/
    /**
     * Api Url : api/v1/location/divisions;
     * @return string
     */

    public function getAllDistrict($doctor_search = false)
    {
        if($doctor_search) {
            return $this->prefix . '/location/districts?doctor_search=1';
        } else {
            return $this->prefix . '/location/districts';
        }
    }

    /**
     * API URL : api/v1/location/divisions'.'/'.$division.'/'.'districts
     * @param $division
     * @return string
     */

    public function getDistrictListByDivision($division, $doctor_search = false)
    {
        if($doctor_search) {
            return $this->prefix . '/location/divisions' . '/' . $division . '/' . 'districts?doctor_search=1';
        } else {
            return $this->prefix . '/location/divisions' .'/' . $division .'/' . 'districts';
        }
    }
    /**
     * API URL : api/v2/location/areas'
     * @return string
     */
    public function getAreaListByDivisionDistrict()
    {
        return $this->prefix.'/location/areas';
    }

    public function getAreaListByDistrict($district)
    {
        {
            return $this->prefix . '/location/districts' .'/' . $district .'/' . 'areas';
        }
    }

    /*End of Locations based api*/

    /* Start of ask a doctor section */

    /**
     * API URL : api/v1/topics
     * @return string
     */
    public function getTopicsList()
    {
        return $this->prefix.'/topics';
    }

    /*start ask a doctor question submit*/

    public function postQuestionToDoctorAPi()
    {
        return $this->prefix.'/user/ask-doctor';
    }

    /*start ask a doctor question update*/

    public function updateQuestionToDoctorAPi($id)
    {
        return $this->prefix.'/user/ask-doctor/update'.'/'.$id;
    }

    /**
     * @return string
     */
    public function getQuestionTopicsList()
    {
        return $this->prefix.'/topics?with=questions';
    }

    /**
     *API URL :  api/v2/ask-doctor?q=featured
     * @return string
     */
    public function getFeaturedQuestions()
    {
        return $this->prefix.'/ask-doctor?q=featured';
    }

    /**
     * API url : api/v2/ask-doctor
     * @return string
     */
    public function getAllQuestions()
    {
        return $this->prefix.'/ask-doctor';
    }

    /**
     * Api url : api/v2/ask-doctor/{id}
     * @param $id
     * @return string
     */
    public function getQuestionDetails($id)
    {
        return $this->prefix.'/ask-doctor'.'/'.$id;
    }

    /**
     * @param $id
     * @return string
     */
    public function getQuestionsWithTopics($id)
    {
        return $this->prefix.'/topics'.'/'.$id.'/'.'queries';
    }
    /*End of ask a doctor section*/

    /* Start of user feedback section */

    /**
     * @return string
     */
    public function postUserFeedback()
    {
        return $this->prefix.'/feedback';
    }

    /*End of user feedback section*/

    /*End of data with Query and params*/

    /*Email subscription for newsletter*/
    public function postNewsletterSubscription()
    {
        return $this->prefix.'/newsletter/subscription';
    }

    public function newsletterActivationApi()
    {
        return $this->prefix . '/newsletter/subscription/activation';
    }

    /* Register and login a user , using phone number verification*/

    public function accountKitRegisterUserUrl(){
        return $this->prefix.'/social/account-kit/facebook';
    }

    public function accountKitAuthInformation($version, $code, $app_id , $secret) {
        return 'https://graph.accountkit.com/'.$version.'/access_token?'.
        'grant_type=authorization_code'.
        '&code='.$code.
        "&access_token=AA|$app_id|$secret";
    }

    public function accountKitInformation($token, $version) {
        return 'https://graph.accountkit.com/'.$version.'/me?'.
        'access_token='.$token;
    }

    public function getUserWithMobile() {
        return $this->prefix.'/user/mobile/verification';
    }

    public function verifyUserEmailAddress() {
        return $this->prefix.'/verify/user/email';
    }

    public function sendEmailVerificationApiUrl() {
        return $this->prefix.'/send/email/verification-url';
    }

    public function sendEmailVerificationCodeApiUrl() {
        return $this->prefix.'/user/profile/change-email';
    }

    public function confirmEmailVerificationCodeApiUrl() {
        return $this->prefix.'/user/profile/confirm-change-email';
    }

    public function changePasswordApiUrl() {
        return $this->prefix.'/auth/password/add';
    }

    /* Start Health Tips Section*/

    public function getHealthTipsDataWithPagination($page, $limit, $platform = 'web')
    {
        return $this->prefix.'/health-tips?page='.$page.'&q=&platform='.$platform.'&limit='.$limit;
    }

    public function getHealthTipsDataApi() {
        return $this->prefix.'/health-tips';
    }

    public function getSpecificHealthTipsDataApi($id) {
        return $this->prefix.'/health-tips/'.$id;
    }

    public function getHealthtipsCategoryList() {
        return $this->prefix.'/healthtips-categories';
    }

    public function getHealthTipsByCategory($id) {
        return $this->prefix.'/category/'.$id.'/health-tips';
    }


    /*End Health Tips Section*/

    /* subscription api lists*/

    public function getSubscriptionPlanList()
    {
        return $this->prefix.'/subscription/plan';
    }

    public function getSubscriptionPlanInformation()
    {
        return $this->prefix.'/subscription/plan/details';
    }

    /*
     * method : post
     * url: enable subscription
     * param: provider i.e robi, api_token, plan_id i.e daily
     */

    public function enableRobiSubscription()
    {
        return $this->prefix.'/subscription/operator/enable';
    }

    /* method : post , parm required : plan_id and platform */

    public function getSslWirelessinformation()
    {
        return $this->prefix.'/subscription/sslwireless/information';
    }

    public function getProviderInformation($id)
    {
        return $this->prefix.'/subscription/providers/details/'.$id;
    }



    public function enableSslWirelessSubscription()
    {
        return $this->prefix.'/subscription/sslwireless/payment';
    }

    public function enableTrialSubscriptionPlan()
    {
        return $this->prefix.'/subscription/enable-trial';
    }

    /*
     * method : post
     * url: disable subscription
     * param: provider i.e robi
     */

    public function disableSubscription()
    {
        return $this->prefix.'/subscription/disable';
    }
    // these  api not required right now

    /*
     * method : post
     * url: blink unsubscription
     * param: customer_membership_id,customer_mobile,plan_slug
     */

    public function blinkUnsubscription()
    {
        return $this->prefix.'/subscription/disable';
    }
    // these  api not required right now

    /*
     * method : post
     * url: plan/update
     * param: plan_id
     */
    // subscription plan update require plan_id param
    public function changeSubscriptionPlan() {
        return $this->prefix.'/subscription/plan/update';

    }

    /*
     * method : post
     * url: subscription-status/{robi}
     */

    // subscription status require provider name in url

    public function getSubscriptionStatus(){
        return $this->prefix.'/subscription/subscription-status';
    }

    public function postProfileUpdateApi()
    {
        return $this->prefix.'/user/profile';
    }

    /* End subscription api*/

    /*start health directory api*/

    public function getHealthDirectoryData($healthDirectory) {
        return $this->prefix.'/'.$healthDirectory;
    }

    public function getHealthDirectoryDataById($directory, $id) {
        return $this->prefix.'/'.$directory.'/'.$id;
    }
    /*end health directory api*/

    /*start question reaction api*/
    public function postAnswerReactionApi() {
        return $this->prefix.'/answer/reaction';
    }

    /**
     * @return string
     */
    public function getBkashTrxIDCheckApiUrl() {
        return $this->prefix.'/subscription/bkash/trxid';
    }

    /**
     * @return string
     */
    public function getBkashTrxIDCheckApiUrlInAgentPanel() {

        return $this->agentPrefix.'/bkash/trxID';
    }

    /**
     * @return string
     */
    public function getBkashTransactionUrl() {

        return $this->prefix.'/subscription/bkash/payment/gateway';
    }


    public function getVideoBlogs()
    {
        return $this->prefix . '/video-blogs';
    }
    public function getSampleCollectionVendor(){
        return $this->prefix.'/sample-collection/partners';
    }

    public function getSampleCollectionTestList(){
        return $this->prefix.'/sample-collection/test-names';
    }

    public function postSampleCollectionApi()
    {
        return $this->prefix.'/sample-collection-request/store';
    }
    public function sampleCollectionPaymentIntregation()
    {
        return 'subscription/sample-collection/payment';
    }

    /**
     * Url for  all payment service ( New URL)
     * @return string
     */
    public function paymentIntregationUrl()
    {
        return 'payment/payment-request';
    }

    public function sampleCollectionRequestList()
    {
        return $this->prefix.'/sample-collection-requests';
    }

    public function sampleCollectionRequestDetails()
    {
        return $this->prefix.'/sample-collection-request-details';
    }

    public function getDoctorSpecialitiesForTeleMedicine()
    {
        // return $this->prefix.'/specialities/tele-medicine/all';
        return $this->prefix.'/specialities';
    }
    public function getTeleMedicineSpecialityWiseDoctorList()
    {
        return $this->prefix.'/telemedicine-doctors';
    }

    public function getTeleMedicineDoctorDetails($doctor_id)
    {
        return $this->prefix.'/telemedicine-doctors/'. $doctor_id;
    }

    public function teleMedicineRequestSubmit()
    {
        return $this->prefix.'/telemedicine/request/store';
    }

    public function teleMedicinePaymentIntegration()
    {
        return 'subscription/telemedicine/payment';
    }

    public function userTeleMedicineAppointmentHistory()
    {
        return $this->prefix.'/user/telemedicine';
    }

    public function getTeleMedicineDiscountAmount(){

        return $this->prefix.'/promotional-code/check';

    }

    public function getTeleMedicineRequestDetails($request_id)
    {
        return $this->prefix.'/user/telemedicine/'. $request_id;
    }

    public function getDoctorFollowUpPackages(){
        return $this->prefix.'/followup-package-list';
    }

    public function doctorFollowUpRequestStore(){
        return $this->prefix.'/followup-request';
    }

    public function doctorFollowUpRequestList(){
        return $this->prefix.'/followup-request-list';
    }

    public function doctorFollowUpRequestDetails()
    {
        return $this->prefix.'/followup-request-details';
    }
}