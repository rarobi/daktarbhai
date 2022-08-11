<?php

namespace App\Http\Controllers\Pages\Doctor;

use App\Http\Controllers\ApiListController;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class DoctorsController extends ApiListController
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

    public function index(Request $request, $specialityId = null, $page = null)
    {
        $data['default'] = 1; // what does it actually do?

        if($request->all() != null) {
            $params                        = [
                'division'                 => $request->division_name,
                'district'                 => $request->district_name,
                'name'                     => $request->doctor_name,
                'gender'                   => $request->gender,
                'category'                 => $request->search_id,
                'area'                     => trim($request->area),
                'page'                     => $request->page,
                'platform'                 => 'web',
                'limit'                    => $this->limit,
                'api_token'                => decrypt(session('user'))->access_token,
            ];

            if($request->has('filter')){
//                $url                  = $this->getDoctorListSearchApi();
                $url                  = $this->getDoctorListApi();
                $params['filter']     = $request->filter;
                $params['appointment_date']     = Carbon::tomorrow()->toDateString();

            } else {
                $url                  = $this->getDoctorListApi();
            }
            foreach($params as $key=>$value)
            {
                if(is_null($value) || $value == '')
                    unset($params[$key]);
            }

            // TODO: very bad way to call a API - Need to fix it asap
            $data['query_string']          = "division_name=$request->division_name&district_name=$request->district_name&doctor_name=$request->doctor_name&gender=$request->gender&category=$request->category&area=$request->area&filter=$request->filter&page=".$page;

            $result                        = $this->getQueryArticleListDataApi($url, $params);
            $data['doctors']               = isset($result->doctors) ? $result->doctors : null;
            $data['paginator']             = isset($result->paginator) ? $result->paginator : null;
            $data['default'] = 0;
        }

        if(isset($specialityId) && $specialityId != null) {
            $url                           = $this->getDoctorListApi();
            $params                        = [
                'category'      => $specialityId,
                'page'          => $page,
                'platform'      => 'web',
                'limit'         => $this->limit
            ];
            $result                        = $this->getQueryArticleListDataApi($url, $params);
            $data['doctors']               = isset($result->doctors) ? $result->doctors : null;
            $data['paginator']             = isset($result->paginator) ? $result->paginator : null;
            $data['specialityId']          = $specialityId;
            $data['default'] = 0;
        }

        $url                               = $this->getAllDivision();
        $result                            = $this->getDataFromApi($url);
        $data['divisions']                 = isset($result->divisions) ? $result->divisions : null;

        /*Need after further requirement if need  only doctor based district show*/
//        $distUrl                           = $this->getAllDistrict(true);
        $distUrl                           = $this->getAllDistrict();
        $distResult                         = $this->getDataFromApi($distUrl);
        $data['districts']                 = isset($distResult->districts) ? $distResult->districts : null;

        $areaApiUrl    =   $this->getAreaListByDivisionDistrict();
        $areaParams = [
            'division'      => $request->division_name,
            'district'      => $request->district_name,
            'with'          => 'hospitals',
            'platform'      => 'web',
        ];
        $AreaResult    = $this->getQueryArticleListDataApi($areaApiUrl, $areaParams);

        if($request->district_name == "" && $request->division_name == "" ) {
            $data['areas'] = [];
        } else {
        $data['areas'] = isset($AreaResult->areas) ? $AreaResult->areas : null;
        }

        //search specialities by name
        $data['specialities'] = $this->getFeaturedSpecialities(6);

        $data['search_specialities'] = $this->getFeaturedSpecialities();
        $data['s_search']   =   array();
        if(isset($data['search_specialities']) && $data['search_specialities'] != null) {

            foreach ($data['search_specialities'] as $key=>$speciality){
                $data['s_search'][$key]['name'] =   $speciality->name;
                $data['s_search'][$key]['id'] =   $speciality->id;
                $data['s_search'][$key]['type'] =   'spt';  //specialities type named as spt
            }
        }

        $data['search_specialities'] = array();
        $data['search_specialities'] = json_encode($data['s_search']);


        //search doctor by name
        $data['search_doctor'] = $this->getSearchDoctor();
        $data['doc_search']   =   array();

        if(isset($data['search_doctor']) && $data['search_doctor'] != null) {
            foreach ($data['search_doctor'] as $key=>$doctor){
                $data['doc_search'][$key]['name'] =   $doctor->name;
                $data['doc_search'][$key]['id'] =   $doctor->doctor_id;
                $data['doc_search'][$key]['type'] =   'doc';  //doctor type named as doc
            }
        }

        $data['search_doctor'] = array();
        $data['search_doctors'] = json_encode($data['doc_search']);



        return view('frontend.pages.doctor.index',$data);
    }

    public function doctorSearchDetails(Request $request, $specialityId = null, $page = null)
    {
        if(session('user') != null){
            if ($request->has('search_id') && $request->search_id != null) {
                $doctor_name = "";
            } else {
                $doctor_name = $request->doctor_name;
            }

            if ($request->doctor_name == "" && $request->search_id == "" && $request->filter == "") {
                $scheduleFilter = 'next_15_days';
            } else {
                $scheduleFilter = $request->filter;
            }

        if ($request->all() != null) {
            $params = [
                'division'  => $request->division_name,
                'district'  => $request->district_name,
                'name'      => $doctor_name,
                'gender'    => $request->gender,
                'category'  => $request->search_id,
                'area'      => trim($request->area),
                'filter'    => $scheduleFilter,
                'page'      => $request->page,
                'platform'  => 'web',
                'limit'     => $this->limit,
                'api_token' => decrypt(session('user'))->access_token
            ];

            if ($request->has('filter')) {
                $url = $this->getDoctorListApi();
               // $url = $this->getDoctorListSearchApi();
                $params['filter'] = $scheduleFilter;
                $params['api_token'] = decrypt(session('user'))->access_token;
                $params['appointment_date'] = Carbon::tomorrow()->toDateString();

            } else {
                $params['filter'] = $scheduleFilter;
                $params['api_token'] = decrypt(session('user'))->access_token;
                $url = $this->getDoctorListApi();
            }

            foreach($params as $key=>$value)
            {
                if(is_null($value) || $value == '')
                    unset($params[$key]);
            }
            // Removing values that does not has value
            // TODO: very bad way to call a API - Need to fix it asap

                /*
                 * Original query string
                 */
//            $data['query_string'] = "division_name=$request->division_name&district_name=$request->district_name&doctor_name=$doctor_name&gender=$request->gender&search_id=$request->search_id&area=$request->area&filter=$scheduleFilter&page=" . $page;

                /*
                 * Zunaid Query String
                 */
                $query_division_name = isset($request->division_name) ? "division_name=".$request->division_name."&" : "";
                $query_district_name = isset($request->district_name) ? "district_name=".$request->district_name."&" : "";
                $query_doctor = !empty($doctor_name) ? "doctor_name=".$doctor_name."&" : "";
                $query_gender = isset($request->gender) ? "gender=".$request->gender."&" : "";
                $query_search_id = isset($request->search_id) ? "search_id=".$request->search_id."&" : "";
                $query_area = isset($request->area) ? "area=".$request->area."&" : "";
                $query_filter = isset($scheduleFilter) ? "filter=".$scheduleFilter."&" : "";
                $data['query_string'] = $query_division_name . $query_district_name . $query_doctor . $query_gender . $query_search_id . $query_area . $query_filter . "page=" . $page;


            $result = $this->getQueryArticleListDataApi($url, $params);
            $data['doctors'] = isset($result->doctors) ? $result->doctors : null;
            $data['doctors'];
            $data['paginator'] = isset($result->paginator) ? $result->paginator : null;
            $data['default'] = 0;
        }

            if (isset($specialityId) && $specialityId != null) {
                $url = $this->getDoctorListApi();
                $params = [
                    'category' => $specialityId,
                    'page' => $page,
                    'platform' => 'web',
                    'limit' => $this->limit
                ];
                $result = $this->getQueryArticleListDataApi($url, $params);
                $data['doctors'] = isset($result->doctors) ? $result->doctors : null;
                $data['paginator'] = isset($result->paginator) ? $result->paginator : null;
                $data['specialityId'] = $specialityId;
                $data['default'] = 0;
            }

            $url = $this->getAllDivision();
            $result = $this->getDataFromApi($url);
            $data['divisions'] = isset($result->divisions) ? $result->divisions : null;

            $distUrl = $this->getAllDistrict();
            $distResult = $this->getDataFromApi($distUrl);
            $data['districts'] = isset($distResult->districts) ? $distResult->districts : null;

            $areaApiUrl = $this->getAreaListByDivisionDistrict();
            $areaParams = [
                'division' => $request->division_name,
                'district' => $request->district_name,
                'with' => 'hospitals',
                'platform' => 'web',
            ];
            $AreaResult = $this->getQueryArticleListDataApi($areaApiUrl, $areaParams);

            if ($request->district_name == "" && $request->division_name == "") {
                $data['areas'] = [];
            } else {
                $data['areas'] = isset($AreaResult->areas) ? $AreaResult->areas : null;
            }

            //search specialities by name
            $data['specialities'] = $this->getFeaturedSpecialities(6);

            $data['search_specialities'] = $this->getFeaturedSpecialities();
            $data['s_search'] = array();

            if(isset($data['search_specialities']) && $data['search_specialities'] != null) {
                foreach ($data['search_specialities'] as $key => $speciality) {
                    $data['s_search'][$key]['name'] = $speciality->name;
                    $data['s_search'][$key]['id'] = $speciality->id;
                    $data['s_search'][$key]['type'] = 'spt';  //specialities type named as spt
                }
            }

            $data['search_specialities'] = array();
            $data['search_specialities'] = json_encode($data['s_search']);


            //search doctor by name
            $data['search_doctor'] = $this->getSearchDoctor();
            $data['doc_search'] = array();
            if (isset($data['search_doctor']) && $data['search_doctor'] != null)
            {
                foreach ($data['search_doctor'] as $key => $doctor) {
                    $data['doc_search'][$key]['name'] = $doctor->name;
                    $data['doc_search'][$key]['id'] = $doctor->doctor_id;
                    $data['doc_search'][$key]['type'] = 'doc';  //doctor type named as doc
                }
            }
            $data['search_doctor'] = array();
            $data['search_doctors'] = json_encode($data['doc_search']);

            $data['doc_name'] = $request->doctor_name or null;
            $data['div_name'] = $request->division_name;
            $data['dist_name'] = $request->district_name;
            $data['schedule'] = $scheduleFilter;
            $data['gender'] = $request->gender;

            $data['first_page'] = $this->current_page = 1;

            return view('frontend.pages.doctor.search-details',$data);

        } else {
            return redirect('/signin');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if(session('user')) {
            $data['user'] = decrypt(session('user'));
        }

        if($request->exists('utm_source') && $request->input('utm_source') &&  $request->input('utm_source') == 'DSP')
        {
            $data['utm_source'] = true;
        } else {
            $data['utm_source'] = false;
        }

        $url              = $this->getDoctorDataApi($id);

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

        if( $result != null && $result->status_code == 200) {
            $data['related_doctors'] = isset($result->related->doctors) ? $result->related->doctors : null;
            $data['doctor']   = isset($result->doctor) ? $result->doctor : null;
            $data['chambers'] = isset($result->doctor->chambers) ? $result->doctor->chambers : null;
            $data['selected'] = isset($result->selected) ? $result->selected : null;

            $data['specialities'] = $this->getFeaturedSpecialities(6);
            $data['search_specialities'] = $this->getFeaturedSpecialities();

            return view('frontend.pages.doctor.show', $data);
        } else if($result->status_code == 500) {
            abort(500);
        } else {
            abort(404);
        }

    }

    public function getSchedule($id, $date)
    {
        $url              = $this->getDoctorScheduleDataApi($id, $date);
        $result           = $this->getDataFromApi($url);

        if(isset($result->doctor->chambers)) {
            $data['chambers'] = $result->doctor->chambers;
            return view('frontend.pages.doctor.schedule', $data);
        } else {
            return "<h2> No Chambers are available</h2>";
        }

    }

    public function getDoctorSchedule(Request $request)
    {
        $input = $request->except('_token');
        $scheduleId = $input['schedule_id'];
        $dateTime = $input['date_time'];

        $chamber  = \GuzzleHttp\json_decode($input['chamber']);
        $doctorId = $chamber->doctor_id;
        if(session('chamber-data')) {
            Session::forget('chamber-data');
        }
        session(['chamber-data' => $chamber]);

        if(session('appointmentUrl')) {
            Session::forget('appointmentUrl');
        }

        $appointmentUrl = url('/').'/'.'doctor/'.$doctorId.'/'.$scheduleId.'/dateTime/'.$dateTime;
        session(['appointmentUrl' => $appointmentUrl]);

        $data['error'] = 'sign-in';

        return redirect('doctor/'.$doctorId.'/'.$scheduleId.'/dateTime/'.$dateTime);

    }

    private function getFeaturedSpecialities($sLimit = null)
    {
        $specialities = null;
        $page                       = 1;
        $params                        = [
            'page'          => $page,
            'platform'      => 'web',
        ];
        if($sLimit != null){
            $params['limit']        = $sLimit;
        }


        $specialitiesApiUrl = $this->getDoctorSpecialitieswithDoctor();
        $result = $this->getQueryArticleListDataApi($specialitiesApiUrl, $params);

        if( $result != null && isset($result->specialities) && count($result->specialities)) {
            $specialities = $result->specialities;
        }

        return $specialities;
    }

    private function getSearchDoctor($docLimit = null)
    {
        $doctors = null;
        $params=null;
        if($docLimit != null){
            $params['limit']        = $docLimit;
        }

        $params['platform']     = 'web';
        $params['filter']     = 'next_15_days';

        $doctorsApiUrl = $this->getDoctorListApi();
        $result = $this->getQueryArticleListDataApi($doctorsApiUrl, $params);

        if( $result != null && isset($result->doctors) && count($result->doctors)) {
            $doctors = $result->doctors;
        }

        return $doctors;
    }
}
