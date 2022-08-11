<?php

namespace App\Http\Controllers\Pages\Doctor;

use App\Http\Controllers\ApiAuthenticatedListController;
use App\Http\Requests\Pages\AppointmentConfirmRequest;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class DoctorsAppointmentController extends ApiAuthenticatedListController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $limit;

    public function __construct()
    {
        parent::__construct();
        $this->limit            = 8;
    }

    public function confirm_appointment_form($doctor_id, $schedule_id, $dateTime)
    {
        if(\Cookie::has('_tn')) {
//        if(session('user')) {
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

//            dd($data);
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
                    $data['chamber'] = session('chamber-data');
                    $url = $this->getDoctorDataApi($doctor_id);

                    $params                        = [
                        'api_token'                => $user->access_token
                    ];

                    $result = $this->getQueryArticleListDataApi($url, $params);

                    if ($result->status == 'error') {
                        return redirect()->route('frontend.doctor.show', $doctor_id)->withErrors('Something went wrong. Please try again later or contact to support.');
                    }

                    $data['doctor'] = $result->doctor;
                    $data['doctor_schedule_id'] = $schedule_id;
                    $data['user'] = $user;

                    return view('frontend.pages.doctor.confirm-appointment', $data);
                } else {
                    return redirect()->route('frontend.doctor.show', $doctor_id)->withErrors('Sorry, Appointment date must be greater than today.');
                }
            } else {
                return redirect()->route('frontend.doctor.show', $doctor_id)->withErrors('Something went wrong. Please try again.');
            }
        } else {
            return redirect()->route('frontend.signin');
        }


    }

    /**
     * @param AppointmentConfirmRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function confirmAppointment(AppointmentConfirmRequest $request)
    {
//        if(session('user')) {
        if(\Cookie::has('_tn')) {
            if(session('appointmentUrl')) {
                Session::forget('appointmentUrl');
            }
            $input                 = $request->except('_token','datetime');
            $input['contact_number'] = '+880'.$request->contact_number;
            $input['api_token']    = decrypt(\Cookie::get('_tn')); //session('user')->access_token;

            $dateTimeCheckStatus = checkIsAValidTimeStamp($request->input('datetime'));

            if( ! $dateTimeCheckStatus) {
                return redirect()->back()->withInput();
            }

            $dateTime              = $request->input('datetime');

            $dateTime = date('Y-m-d g:i a',$dateTime);

            $selectedDateTime = Carbon::createFromFormat('Y-m-d g:i a', $dateTime, 'Asia/Dhaka')->toDateTimeString();
            $selectedDateTime = Carbon::parse($selectedDateTime);

            $input['booking_date'] = $selectedDateTime->toDateString();
            $input['booking_time'] = $selectedDateTime->format('g:i a');

            $url                   = $this->postAppointmentConfirm();
            $result                = $this->postDataFromApi($url, $input);

            if($result == null || $result->status_code == 400) {
                $data['error'] = isset($result->error->message) ? $result->error->message : 'Some technical problem occurred. Please contact to our support.';
                $data['doctor_id'] = $input['doctor_id'];

                return redirect()->route('frontend.doctor.show', $data['doctor_id'])->withErrors($data['error']);

            } else if($result->status_code == 500) {
                abort(500);

            } else if($result->status_code == 200) {
                $data['success']            = 'Successful.';
                $data['appointmentDetails'] = $result->appointment;
                return redirect()->to('profile/appointment-history')->with('data', $data);
//                return view('frontend.pages.doctor.appointment-success', $data);
            } else {
                return redirect()->route('frontend.doctor.show', $input['doctor_id']);
            }

        } else {
            return redirect()->route('frontend.signin');
        }
    }

    public function appointmentFeedback(Request $request )
    {
        $data['appointment_id'] = $request->get('appointment_id');
        $data['visit_status'] = $request->get('visit_status');
        $data['customer_feedback'] = $request->get('customer_feedback');

        $appointmentUrl = $this->postCustomerBookAppointmentFeedback();

        $params                        = [
            'api_token'          => decrypt(\Cookie::get('_tn')), // session('user')->access_token,
            'platform'           => 'web',
//            'page'             =>  $page,
            'appointment_id'     =>  $data['appointment_id'],
            'is_visit'           =>  $data['visit_status'] ,
            'customer_feedback'  =>  $data['customer_feedback'] ,
            'limit'              => $this->limit
        ];

        $result = $this->postDataFromApi($appointmentUrl, $params);


        return response()->json($result);

    }

}
