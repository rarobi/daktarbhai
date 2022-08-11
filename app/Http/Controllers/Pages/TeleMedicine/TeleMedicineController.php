<?php

namespace App\Http\Controllers\Pages\TeleMedicine;

use App\Http\Controllers\ApiAuthenticatedListController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;


class TeleMedicineController extends ApiAuthenticatedListController
{


    public function telemedicineAppointmentHistory(Request $request){

        $data['user'] = decrypt(session('user'));

        $param                        = [
            'api_token'                => $data['user']->access_token
        ];

        $url = $this->userTeleMedicineAppointmentHistory();

       $result = $this->getQueryArticleListDataApi($url,$param);


        if (isset($result) && $result->status_code == 200){
            $data['success'] = $request->message;
            $data['error']   = $request->errorMsg;
            $data['user_telemedicine_history'] = $result->telemedicine;
        }
        else{
            $data['user_telemedicine_history'] = null;
        }

        return view('frontend.pages.Tele-Medicine.telemedicine-appointment-history',$data);


    }

    /**
     * for getting doctor specialities
     * @return string|void
     */
    public function getDoctorSpecialities()
    {

        $url = $this->getDoctorSpecialitiesForTeleMedicine();
        $result = $this->getDataFromApi($url);

        if( $result != null && isset($result->specialities) && count($result->specialities)) {
            $data['specialities'] = $result->specialities;
        }else{
            $data['specialities'] = null;
        }

//        $url_for_speciality         = $this->getDoctorSpecialities();
//        $data['speciality_list']    = $this->getDataFromApi($url_for_speciality);
//
       $url_for_district         = $this->getAllDistrict();
       $data['district_list']    = $this->getDataFromApi($url_for_district);

//        dd($data['specialities']);

        return view('frontend.pages.Tele-Medicine.specialist-list', $data);

    }

    public function getDoctorSpecialitiesForSearch(){

        $url_for_speciality = $this->getDoctorSpecialitiesForTeleMedicine();
        $speciality_list    = $this->getDataFromApi($url_for_speciality);

        $data['specialities'] = [];

        if (!is_null($speciality_list) && count($speciality_list->specialities) > 0){
            foreach ($speciality_list->specialities as $speciality) {
                $data['specialities'][] = [
                    'value' => $speciality->name,
                    'id'    => $speciality->id,
                    'name'  => $speciality->name,
                ];
            }
        }

        return response()->json($data['specialities']);
    }

    public function specialityWiseDoctorList(Request $request){

        $speciality_id  = $request->input('speciality_id');
        $district_id    = $request->input('district_id');

        $data['user'] = decrypt(session('user'));

        $params = [
            'category'  => $speciality_id,
            'platform'  => 'web',
            'api_token' => $data['user'] ->access_token,
            'district'  => $district_id,
        ];

        $url = $this->getTeleMedicineSpecialityWiseDoctorList();

        $result = $this->getQueryArticleListDataApi($url,$params);

        $data['doctors'] = isset($result->doctors) ? $result->doctors : null;

        $data['paginator'] = isset($result->paginator) ? $result->paginator : null;

        return view('frontend.pages.Tele-Medicine.doctor-list',$data);


    }

    public function doctorDetails(Request $request,$id){


        $doctor_id = $id;

        $data['user'] = decrypt(session('user'));

        $url = $this->getTeleMedicineDoctorDetails($doctor_id);

        if (isset($request) && $request->all() != null) {
            $params                        = [
                'appointment_date'         => $request->appointment_date,
                'api_token'                => $data['user']->access_token
            ];
            $result                        = $this->getQueryArticleListDataApi($url, $params);

        } else {

            $params                        = [
                'api_token'                => $data['user']->access_token
            ];

            $result = $this->getQueryArticleListDataApi($url, $params);

        }
//dd($result);

        if( $result != null && $result->status_code == 200) {
            $data['doctor']   = isset($result->doctor) ? $result->doctor : null;
            $data['chambers'] = isset($result->doctor->chambers) ? $result->doctor->chambers : null;
            $data['selected'] = isset($result->selected) ? $result->selected : null;


            return view('frontend.pages.Tele-Medicine.book-doctor-appointment', $data);
        } else if($result->status_code == 500) {
            abort(500);
        } else {
            abort(404);
        }

    }

    public function appointmentInfo(Request $request){

        $input = $request->except('_token');


        $chamber  = \GuzzleHttp\json_decode($input['chamber']);

        $doctor_id = $chamber->doctor_id;

        $schedule_id = $input['schedule_id'];
        $dateTime = $input['date_time'];


            $user = decrypt(session('user'));

        if(isset($user->mobile) && $user->mobile != null) {
            $mobileString = substr(trim($user->mobile), 0, 4);

            if($mobileString == '+880' || $mobileString == '8801') {
                if($mobileString == '+880') {
                    $data['contactNumber'] = substr(trim($user->mobile), 4,14);
                } else {
                    $data['contactNumber'] = substr(trim($user->mobile), 3,13);
                }
            } else {
                $data['contactNumber'] = '';
            }
        } else {
            $data['contactNumber'] = '';
        }

        if(isset($user->date_of_birth)){
            $date_of_birth                  =   new \DateTime($user->date_of_birth);
            $today                          =   new \DateTime('today');
            $data['claimer_age_in_years']   =   (int) $date_of_birth->diff($today)->y;
        }

            $dateTimeCheckStatus = checkIsAValidTimeStamp($dateTime);

            date_default_timezone_set('Asia/Dhaka');
            if ($dateTimeCheckStatus) {
                $data['dateTime'] = $dateTime; // set the unix time

                $dateTime = date('Y-m-d g:i a',$dateTime);

                $selectedDateTime = Carbon::createFromFormat('Y-m-d g:i a', $dateTime, 'Asia/Dhaka')->toDateTimeString();
                $selectedDateTime = Carbon::parse($selectedDateTime);

                $data['booking_date'] = $selectedDateTime->toDateString();
                $data['booking_time'] = $selectedDateTime->format('g:i a');
                $today = Carbon::now()->toDateString();

                if ($today < $data['booking_date']) {
//                    $data['chamber'] = session('chamber-data');
                    $url = $this->getTeleMedicineDoctorDetails($doctor_id);

                    $params                        = [
                        'api_token'                => $user->access_token
                    ];

                    $result = $this->getQueryArticleListDataApi($url, $params);

                    if ($result->status == 'error') {
                        return redirect()->route('frontend.pages.Tele-Medicine.book-doctor-appointment', $doctor_id)->withErrors('Something went wrong. Please try again later or contact to support.');
                    }

                    $data['doctor'] = $result->doctor;
                    $data['doctor_schedule_id'] = $schedule_id;
                    $data['user'] = $user;
                    $data['chamber'] = $chamber;

                    return view('frontend.pages.Tele-Medicine.confirm-appointment', $data);
                } else {
                    return redirect()->route('frontend.pages.Tele-Medicine.book-doctor-appointment', $doctor_id)->withErrors('Sorry, Appointment date must be greater than today.');
                }
            } else {
                return redirect()->route('frontend.pages.Tele-Medicine.book-doctor-appointment', $doctor_id)->withErrors('Something went wrong. Please try again.');
            }
        }

    public function confirmAppointment(Request $request){

        $requestData = $request->except('_token');
        $user = decrypt(session('user'));
        $doctor_info =     json_decode($requestData['doctor_info']);

        if (isset($requestData['discount_amount'])){
            $consultancy_fee = $requestData['discount_amount'];
        }
        else{
            if (isset($doctor_info->chambers)){
                foreach ($doctor_info->chambers as $chamber){

                    $consultancy_fee = $chamber->fixed_new_visit_price;
                }
            }
        }

        $doctor_id          = $doctor_info->doctor_id;
        $doctor_name        = $doctor_info->name;
        $doctor_mobile      = $doctor_info->mobile;
        $doctor_specialty   = $doctor_info->specialities;
        $customer_name      =  strip_tags($requestData['user']);
        $gender             =  strip_tags($requestData['gender']);
        $age                =  strip_tags($requestData['age']);
        $customer_mobile    =  '+880'.strip_tags($requestData['contact_number']);
        $doctor_schedule_id = strip_tags($requestData['doctor_schedule_id']);
        $booking_date       = strip_tags($requestData['booking_date']);
        $booking_time       = Carbon::parse($requestData['booking_time']) ->format('g:i A');

        $params = [
            'api_token'          => $user->access_token,
            'doctor_id'          => $doctor_id,
            'doctor_name'         => $doctor_name,
            'doctor_mobile'      => $doctor_mobile,
            'speciality'         => $doctor_specialty,
            'customer_name'      => $customer_name,
            'customer_mobile'    => $customer_mobile,
            'doctor_schedule_id' => $doctor_schedule_id,
            'age'                => $age,
            'booking_date'       => $booking_date,
            'booking_time'       => $booking_time,
            'gender'             => $gender,
            'payment_amount'     => trim($consultancy_fee),
            'promo_code'         => strip_tags($request->input('promocode')),
        ];

            $url = $this->teleMedicineRequestSubmit();

            $result = $this->postDataFromApi($url,$params);

        if( $result != null && $result->status_code == 200) {

            session(["params"=>$params,"price"=>$consultancy_fee,'request_id'=>$result->telemedicine_request->id]);

            return redirect()->route('frontend.tele-medicine.payment-info');
        } else if($result->status_code == 400) {

            return redirect('/tele-medicine/appointment-history')->with('error',$result->error->message);
        } else {
            abort(404);
        }


        }

    public function paymentInformation(Request $request){

            $data['user'] = decrypt(session('user'));

            $consultancy_fee = $request->input('consultancy_fee');
            $params = json_decode($request->input('params'));

            if (isset($consultancy_fee) && isset($params)){
                $data['consultancy_fee'] = $consultancy_fee;
                $data['params'] = $params;
                $data['request_id'] = $params->id;

            }
            else{
                $data['consultancy_fee'] = \session('price');
                $data['params'] = \session('params');
                $data['request_id'] = \session('request_id');
            }

        return view('frontend.pages.Tele-Medicine.payment-confirmation',$data);

    }

    public function confirmPayment(Request $request){

        $provider_id = strip_tags($request->input('provider_id'));
        $price       = strip_tags($request->input('consultancy_fee'));
        if (trim(session('price'))!= trim($price)){
            return redirect()->back()->with('flash_danger', 'Sorry! Payment amount is not matched with your request store amount. Please input correct amount');
        }

        $params = json_decode(strip_tags($request->input('params')));

        $doctor_id   = $params->doctor_id;
        $doctor_name = $params->doctor_name;
        $doctor_schedule_id = $params->doctor_schedule_id;
        $booking_time = $params->booking_time;
        $booking_date = $params->booking_date;

        $data['user'] = decrypt(session('user'));

        $paramData = [
            'api_token'          => $data['user'] ->access_token,
            'provider_id'        => $provider_id,
            'price'              => $price,
            'platform'           => 'web',
            'doctor_id'          => $doctor_id,
            'doctor_name'        => $doctor_name,
            'doctor_schedule_id' => $doctor_schedule_id,
            'booking_time'       => $booking_time,
            'booking_date'       => $booking_date,
            'appointment_id'     => strip_tags($request->input('request_id')),
            'service_name'       => 'telemedicine'
        ];

//        $url = $this->teleMedicinePaymentIntegration();
        $url    = $this->paymentIntregationUrl();
        $result = $this->postDataFromApi($url,$paramData);

        if(!is_null($result) || $result->code == 200){
            return redirect($result->data);
        }

    }

    public function applyPromoCode(Request $request){

        $requestData = $request->except('_token');

        $doctor_info =     json_decode($requestData['doctor_info']);

        $data['doctor'] = $doctor_info;
        $data['booking_time'] = $requestData['booking_time'];
        $data['booking_date'] = $requestData['booking_date'];
        $data['doctor_schedule_id'] = $requestData['doctor_schedule_id'];
        $data['dateTime'] = $requestData['datetime'];


        $promo_code = $request->input('promo_code');
        $data['amount'] = $request->input('amount');
//        dd($data);

        $data['user'] = decrypt(session('user'));

        if(isset($data['user']->mobile) && $data['user']->mobile != null) {
            $mobileString = substr(trim($data['user']->mobile), 0, 4);

            if($mobileString == '+880' || $mobileString == '8801') {
                if($mobileString == '+880') {
                    $data['contactNumber'] = substr(trim($data['user']->mobile), 4,14);
                } else {
                    $data['contactNumber'] = substr(trim($data['user']->mobile), 3,13);
                }
            } else {
                $data['contactNumber'] = '';
            }
        } else {
            $data['contactNumber'] = '';
        }

        if(isset($data['user']->date_of_birth)){
            $date_of_birth                  =   new \DateTime($data['user']->date_of_birth);
            $today                          =   new \DateTime('today');
            $data['claimer_age_in_years']   =   (int) $date_of_birth->diff($today)->y;
        }

        $params = [
            'api_token' => $data['user']->access_token,
            'promocode' => $promo_code,
            'amount'    => $data['amount'] ,
            'service'    => 1,
        ];

        $url = $this->getTeleMedicineDiscountAmount();

        $data['result'] = $this->getQueryArticleListDataApi($url, $params);

        return view('frontend.pages.Tele-Medicine.confirm-appointment',$data);


    }

    public function teleMedicineRequestDetails($request_id)
    {

        $data['user'] = decrypt(session('user'));

        $url = $this->getTeleMedicineRequestDetails($request_id);

        $param = [
            'api_token'          => $data['user']->access_token,

        ];

        $result = $this->getQueryArticleListDataApi($url, $param);

        $data['telemedicine'] = isset($result->telemedicine) ? $result->telemedicine : null;

        return view('frontend.pages.Tele-Medicine.tele-medicine-details',$data);


    }

    public function teleMedicineInvoiceReport($request_id)
    {
//        dd(1);

        $data['user'] = decrypt(session('user'));

        $url = $this->getTeleMedicineRequestDetails($request_id);

        $param = [
            'api_token'          => $data['user']->access_token,

        ];

        $result = $this->getQueryArticleListDataApi($url, $param);

        $data['invoice'] = isset($result->telemedicine) ? $result->telemedicine : null;

        return view('frontend.pages.Tele-Medicine.tele-medicine-invoice',$data);


    }


}
