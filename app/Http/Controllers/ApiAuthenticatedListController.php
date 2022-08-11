<?php
/**
 * Created by PhpStorm.
 * User: poddar
 * Date: 3/16/17
 * Time: 1:58 PM
 */

namespace App\Http\Controllers;

use Session;


class ApiAuthenticatedListController extends ApiListController
{

    public function __construct()
    {
        parent::__construct();

        $this->middleware(function ($request, $next)
        {
            if(! \Cookie::has('_tn')) {

                \Session::flush();
                \Cookie::queue(\Cookie::forget('_tn'));

                return redirect()->route('frontend.signin');
            } else {
                return $next($request);
            }
        });
    }


    /**
     * @param $id
     * @return string
     * Api URL: api/v2/hospitals/hospital_id/discount
     */
    public function getHospitalDiscountDataApi($id)
    {
        return $this->prefix.'/hospitals'.'/'.$id.'/'.'discount';
    }

    /*section for profile*/

    /**
     * profile for update
     * @param
     * @return string
     * Api URL: api/v2/user/profile/update
     */
    public function getAppointmentHistory()
    {
        return $this->prefix.'/user/appointments';
    }

    public function getDiscountHistory()
    {
        return $this->prefix.'/avail-discounts';
    }
    public function getMyQuestion()
    {
        return $this->prefix.'/user/my-question';
    }

    public function getMyPrescription()
    {
        return $this->prefix.'/user/prescription';
    }

    public function getMyPrescriptionDetails($id)
    {
        return $this->prefix.'/user/prescription/details/'.$id;
    }
    
    public function getProfileInfoApi()
    {
        return $this->prefix.'/user/profile';
    }

    public function postProfileUpdateApi()
    {
       return $this->prefix.'/user/profile/update';
    }


    public function postMobileUpdateApi()
    {
       return $this->prefix.'/user/profile/change-mobile-number';
    }

    public function postProfileImageUpdateApi()
    {
        return $this->prefix.'/user/profile/change-photo';
    }


    /**
     * profile change password;
     * Api url: api/v2/auth/password/change;
     * @return string
     */
    public function postProfileChangePasswordApi()
    {
        return $this->prefix.'/auth/password/change';
    }

    /**
     * profile add password;
     * Api url: api/v2/auth/password/add;
     * @return string
     */
    public function postProfileAddPasswordApi()
    {
        return $this->prefix.'/auth/password/add';
    }

    /*end section for profile*/

    /*start ask a doctor question submit*/

    public function postQuestionToDoctorAPi()
    {
        return $this->prefix.'/user/ask-doctor';
    }

    /*end ask a doctor question submit*/

    /*start phr section on api*/

    public function getAllPhrListApi()
    {
        return $this->prefix.'/phr/cbc';
    }

    public function editCbcPhrApi($id)
    {
        return $this->prefix.'/phr/cbc/'.$id;
    }

    public function getPhrListApi($phr)
    {
        return $this->prefix.'/phr/'.$phr;
    }

    public function editPhrApi($phr, $id)
    {
        return $this->prefix.'/phr/'.$phr.'/'.$id;
    }

    public function getAllPhrReportApi()
    {
        return $this->prefix.'/user/phr/report';
    }

    public function getCoronaVaccineNameApi()
    {
        return $this->prefix.'/phr/vaccine-name-list';
    }

    public function getCoronaVaccineStoreApi()
    {
        return $this->prefix.'/phr/vaccine';
    }

    public function getCoronaVaccineListApi()
    {
        return $this->prefix.'/phr/vaccine';
    }

    public function getCoronaVaccineShowApi($id)
    {
        return $this->prefix.'/phr/vaccine/'.$id;
    }

    /*end phr section*/

    /* subscription history section start*/

    public function getMySubscriptionHistory()
    {
        return $this->prefix.'/subscription/history';
    }

    public function getMySubscriptionHistoryDetail($id)
    {
        return $this->prefix.'/subscription/history'.'/'.$id;
    }
    /* subscription history section end */

    /*user reaction api url*/
    public function userReactionApiUrl($type)
    {
        return $this->prefix.'/favourites/'.$type;
    }

    /* Insurance Claim section Start*/

    /**
     * Insurance Claim api List url;
     * Api url: api/v2/claim-insurance;
     * @return string
     */
    public function getAllInsuranceClaims()
    {
        return $this->prefix . '/claim-insurance';
    }

    /**
     * Insurance Claim api Details url;
     * Api url: api/v2/claim-insurance/{id};
     * @return string
     */
    public function getInsuranceClaimDetails($id)
    {
        return $this->prefix . '/claim-insurance/' . $id;
    }

    /**
     * insurance claim api Post url;
     * Api url: api/v2/claim-insurance;
     * @return string
     */
    public function postInsuranceClaimApi()
    {
        return $this->prefix . '/claim-insurance';
    }

    /**
     * insurance claim api Post url;
     * Api url: api/v2/claim-insurance;
     * @return string
     */
    public function updateInsuranceClaimApi($claimId)
    {
        return $this->prefix . '/claim-insurance/' . $claimId;
    }

    /**
     * Insurance Claim api Doc Removal url;
     * Api url: api/v2/claim-insurance/removeInsuranceClaimDocRecord;
     * @return string
     */
    public function deleteInsuranceClaimDocRecord()
    {
        return $this->prefix . '/claim-insurance/removeInsuranceClaimDocRecord';
    }

    /* Insurance Claim section End */

    /* dynamic discount data api */
    /**
     * @param $id
     * @return string
     * Api URL: api/v2/{health_directory}/{directory_id}/discount
     */
    public function getHealthDirectoryDiscountApi($directory,$id)
    {
        return $this->prefix.'/health-directory/'.$directory.'/'.$id.'/'.'discount';
    }

    /**
     * Banglalink User packages subscription API;
     * Api url: api/v1/subscription/subscribe-customer;
     * @return string
     */
    public function postBlinkSubscriptionApi(){
//        return $this->agentPrefix . '/subscription/subscribe-customer';
        return $this->agentPrefix . '/subscription/charging-request'; //New charging API for Banglalink
    }

    /**
     * Banglalink User packages Unsubscription API;
     * Api url: api/v1/subscription/unsubscribe-customer;
     * @return string
     */
    public function postBlinkUnsubscriptionApi(){
        return $this->agentPrefix . '/subscription/unsubscribe-customer';
    }

    public function postCustomerBookAppointmentFeedback()
    {
        return $this->prefix.'/appointment-feedback';
    }



}