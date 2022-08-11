<?php

namespace App\Http\Controllers\Pages\Phr;

use App\Http\Controllers\ApiAuthenticatedListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PhrModuleController extends ApiAuthenticatedListController
{

    protected $authenticatedUser;
    protected $collectionName;
    protected $phrTransformer;

    /**
     * PhrModuleController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function phrListPage()
    {
        return view('frontend.pages.phr.phr');
    }

    public function index($phr)
    {
        $this->determinePhr($phr);

        $params = ['api_token' => $this->checkAuthenticatedUser()->access_token];

        $phrListApiUrl = $this->getPhrListApi($phr);
        $data['phr'] = $phr;
        $result = $this->getQueryArticleListDataApi($phrListApiUrl, $params);
        if(isset($result->status_code) && $result->status_code == 200) {
            $result = (array) $result;
            $data['phrLists'] = $result[$this->getModuleCollectionName()];
            $data['user'] = $this->checkAuthenticatedUser();
//            dd($data['phrLists']);
            if ($phr == 'bmi') {
                $data['actionColumn'] = 4;
            }
            if ($phr == 'bp') {
                $data['actionColumn'] = 4;
            }
            if ($phr == 'cbc') {
                $data['actionColumn'] = 5;
            }
            if ($phr == 'glucose') {
                $data['actionColumn'] = 5;
            }
            if ($phr == 'kidney') {
                $data['actionColumn'] = 7;
            }
            if ($phr == 'lipid') {
                $data['actionColumn'] = 6;
            }
            if ($phr == 'urine-profile') {
                $data['actionColumn'] = 6;
            }
            if ($phr == 'electrolyte') {
                $data['actionColumn'] = 6;
            }
            if ($phr == 'tumor-marker') {
                $data['actionColumn'] = 6;
            }
            if ($phr == 'liver') {
                $data['actionColumn'] = 5;
            }
            if ($phr == 'serology') {
                $data['actionColumn'] = 8;
            }
            if ($phr == 'thyroid') {
                $data['actionColumn'] = 5;
            }

        } else {
            $data['error'] = trans('strings.generic.error_messages.data_not_found');
        }
        if(isset($data['phrLists']) && $data['phrLists'] == null) {
            return view('frontend.pages.phr.nodata', $data);
        } else {
          return view('frontend.pages.phr.'.$phr.'.index', $data);
        }
    }

    public function create($phr)
    {
        $this->determinePhr($phr);
        $data['phr'] = $phr;
        return view('frontend.pages.phr.'.$phr.'.create', $data);
    }

    public function store(Request $request, $phr)
    {
        /* TODO: Need to separate update code */
        // determine the specific PHR from request
        $this->determinePhr($phr);
        $data['phr'] = $phr;
        // create and transform the newly created record for sending response
        $result = $this->saveOrUpdateRecord($phr, $request);

        if(isset($result->status_code) && $result->status_code == 200) {
            $data['success'] = 'You have updated your '. $phr .' record';
        } else {
            $data['error'] = (isset($result->error) && isset($result->error->message)) ? $result->error->message : trans('strings.generic.error_messages.technical_error');

            return redirect()->route('frontend.phr.create', $phr)->with('error', $data['error'])->with(Input::all());
        }
        return redirect()->route('frontend.phr.index', $phr)->with('success', $data['success']);
    }

    public function show($phr, $id)
    {
        $this->determinePhr($phr);

        $params = [
            'api_token' => $this->checkAuthenticatedUser()->access_token
        ];

        $editPhr = $this->editPhrApi($phr,$id);
        $result = $this->getQueryArticleListDataApi($editPhr, $params);
//        dd($result);
        if(isset($result->status_code) && $result->status_code == 200) {
            $result = (array) $result;
            $data['list'] = $result[$this->getModuleCollectionName()];
            $data['user'] = $this->checkAuthenticatedUser();
            $data['phr'] = $phr;
        } else {
            abort(404);
            $data['error'] = trans('strings.generic.error_messages.data_not_found');
        }
//        return view('frontend.pages.phr.cbc.edit', $data);
        return view('frontend.pages.phr.'.$phr.'.show', $data);
    }

    public function edit($phr,$id)
    {
        $this->determinePhr($phr);

        $params                        = [
            'api_token'          => $this->checkAuthenticatedUser()->access_token
        ];

        $editPhr = $this->editPhrApi($phr,$id);
        $result = $this->getQueryArticleListDataApi($editPhr, $params);
        if(isset($result->status_code) && $result->status_code == 200) {
            $result = (array) $result;
            $data['list'] = $result[$this->getModuleCollectionName()];
            $data['list']->taken_datetime = date('Y-m-d', strtotime($data['list']->taken_datetime));
            if(isset($data['list']->height)) {
                $height = explode('cm', $data['list']->height);
                $data['list']->height = trim($height[0]);
            }
            $data['phr'] = $phr;
            // dd($data['list']);
        } else {
            $data['error'] = trans('strings.generic.error_messages.data_not_found');
        }
//        dd($data);
        return view('frontend.pages.phr.'.$phr.'.edit', $data);
    }

    public function update(Request $request, $phr, $id) {
        $this->determinePhr($phr);
        $data['phr'] = $phr;
        // create and transform the newly created record for sending response
        $result = $this->saveOrUpdateRecord($phr, $request, $id);

        if(isset($result->status_code) && $result->status_code == 200) {
            $data['success'] = 'You have updated your '. $phr .' record';
        } else {
            $data['error'] = (isset($result->error) && isset($result->error->message)) ? $result->error->message : trans('strings.generic.error_messages.technical_error');
            return redirect()->route('frontend.phr.edit', ['phr' => $phr, 'id' => $id])->with('error', $data['error']);
        }
        return redirect()->route('frontend.phr.index', $phr)->with('success', $data['success']);
    }

    public function delete($phr,$id)
    {
        $this->determinePhr($phr);

        $params                        = [
            'api_token'          => $this->checkAuthenticatedUser()->access_token
        ];

        $editPhr = $this->editPhrApi($phr,$id);
        $result = $this->destroyDataFromApi($editPhr, $params);
//        dd($result);
        if(isset($result->status_code) && $result->status_code == 200) {
            $data['success'] = 'Successfully Deleted';
        } else {
            $data['error'] = trans('strings.generic.error_messages.data_not_found');
            return redirect()->route('frontend.phr.index', $phr)->with('error', $data['error']);
        }

        return redirect()->route('frontend.phr.index', $phr)->with('success', $data['success']);
    }

    /**
     * Determine and Set module from the request
     *
     * @param $phr
     * @throws \Exception
     */
    protected function setModuleCollectionName($collectionName)
    {
        $this->collectionName = $collectionName;
    }

    protected function getModuleCollectionName()
    {
        return $this->collectionName;
    }

    private function determinePhr($phr)
    {
        $phr = strtolower($phr);

        if($phr == 'bmi') {

            $this->setModuleCollectionName('bmiRecord');

        } elseif ($phr == 'bp') {

            $this->setModuleCollectionName('bpRecord');

        } elseif ($phr == 'glucose') {

            $this->setModuleCollectionName('glucoseRecord');

        } elseif ($phr == 'cbc') {

            $this->setModuleCollectionName('cbcRecord');

        } elseif ($phr == 'lipid') {

            $this->setModuleCollectionName('lipidRecord');

        } elseif ($phr == 'kidney') {

            $this->setModuleCollectionName('kidneyRecord');

        } elseif ($phr == 'urine-profile') {

            $this->setModuleCollectionName('urineRecord');

        } elseif ($phr == 'electrolyte') {

            $this->setModuleCollectionName('electrolyteRecord');

        } elseif ($phr == 'tumor-marker') {

            $this->setModuleCollectionName('tumorRecord');

        } elseif ($phr == 'liver') {

            $this->setModuleCollectionName('liverRecord');

        } elseif ($phr == 'thyroid') {

            $this->setModuleCollectionName('thyroidRecord');

        } elseif ($phr == 'serology') {

            $this->setModuleCollectionName('serologyRecord');

        } else {

            abort(404);

        }
    }

    protected function checkAuthenticatedUser()
    {

        /* TODO : Move the below if..else code block to a global method */
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

    /**
     * @param $request
     * @param $user
     * @param null $id
     * @return mixed
     * @throws \Exception
     */
    private function saveOrUpdateRecord($phrModule, $request, $id = null)
    {

        // first manage the request input

        $requestedData = $this->manageInputs($phrModule, $request);

        if(is_null($id)) {
            // create record to the database
            $postPhr = $this->getPhrListApi($phrModule);
            $result = $this->postDataFromApi($postPhr, $requestedData);
//            dd($result);
        } else {
            // find the PHR module with the given ID
            $editPhr = $this->editPhrApi($phrModule, $id);
            $result = $this->updateDataFromApi($editPhr, $requestedData);
        }
        return $result;
    }

    private function manageInputs($phrModule, $request)
    {
        $params = [];
        $inputs = $request->except('_token');
        $phr = strtolower($phrModule);
        $params['api_token'] = $this->checkAuthenticatedUser()->access_token;

        if($phr == 'bmi') {
            // dd($inputs);
            $params['height']         = isset($inputs['height_obj']['cm']) ? $inputs['height_obj']['cm'] : null;
            $params['height_unit']    = (isset($inputs['unit']['height'])) ? $inputs['unit']['height'] : 'cm';

            if($params['height_unit'] == 'feet') {
                $params['height_ft']        = isset($inputs['height_obj']['feet']) ? $inputs['height_obj']['feet'] : null;
                $params['height_inches']    = isset($inputs['height_obj']['inch']) ? $inputs['height_obj']['inch'] : null;
            }

            $params['weight']         = $inputs['weight'];
            $params['weight_unit']    = (isset($inputs['unit']['weight'])) ? $inputs['unit']['weight'] : 'kg';
            $params['taken_datetime'] = $inputs['taken_datetime'];

        } elseif ($phr == 'bp') {

            $params['systolic']        = $inputs['systolic'];
            $params['diastolic']       = $inputs['diastolic'];
            $params['taken_datetime']  = $inputs['taken_datetime'];

        } elseif ($phr == 'glucose') {
            //
            $params['type']           = $inputs['type'];
            $params['daytime']        = $inputs['daytime'];
            $params['level']          = $inputs['level'];
            $params['taken_datetime'] = $inputs['taken_datetime'];

        } elseif ($phr == 'cbc') {
            //
            $params = [
                'api_token'        => $this->checkAuthenticatedUser()->access_token,
                'hemoglobin'       => $request->hemoglobin,
                'rbc'              => $request->rbc,
                'pcv'              => $request->pcv,
                'mcv'              => $request->mcv,
                'mch'              => $request->mch,
                'mchc'             => $request->mchc,
                'rwd'              => $request->rwd,
                'total_wbc'        => $request->total_wbc,
                'platelets'        => $request->platelets,
                'neutrophils'      => $request->neutrophils,
                'lymphocytes'      => $request->lymphocytes,
                'monocytes'        => $request->monocytes,
                'basophils'        => $request->basophils_absolute_count,
                'white_cell_count' => $request->white_cell_count,
                'esr'              => $request->esr,
                'eosinophils'      => $request->eosinophils,
                // 'pdw'              => $request->pdw,
                // 'mpv'              => $request->mpv,
                'plateletcript'    => $request->plateletcript,
                'taken_datetime'   => $request->taken_datetime,
            ];

        } elseif ($phr == 'lipid') {
            //
            $params['hdl']                     = $inputs['hdl'];
            $params['ldl']                     = $inputs['ldl'];
            $params['triglycerides']           = $inputs['triglycerides'];
            $params['total_cholesterol']       = $inputs['total_cholesterol'];
            $params['additional_notes']        = $inputs['additional_notes'];
            $params['taken_datetime']          = $inputs['taken_datetime'];

        } elseif ($phr == 'kidney') {
            //
            $params['serum_urea_level']        = $inputs['serum_urea_level'];
            $params['serum_creatinine']        = $inputs['serum_creatinine'];
            $params['serum_uric_acid']         = $inputs['serum_uric_acid'];
            $params['serum_calcium']           = $inputs['serum_calcium'];
            $params['serum_phosphate']         = $inputs['serum_phosphate'];
            $params['eGFR']                    = $inputs['eGFR'];
            $params['serum_urea_nitrogen']     = $inputs['serum_urea_nitrogen'];
            $params['additional_notes']        = $inputs['additional_notes'];
            $params['taken_datetime']          = $inputs['taken_datetime'];

        } elseif ($phr == 'urine-profile') {
            //
            $params['color']                    = isset($inputs['color']) ? $inputs['color'] : null;
            $params['appearance']               = isset($inputs['appearance']) ? $inputs['appearance'] : null;
            $params['sediment']                 = isset($inputs['sediment']) ? $inputs['sediment'] : null;
            $params['reaction']                 = isset($inputs['reaction']) ? $inputs['reaction'] : null;
            $params['phosphate']                = isset($inputs['phosphate']) ? $inputs['phosphate'] : null;
            $params['glucose']                  = isset($inputs['glucose']) ? $inputs['glucose'] : null;
            $params['albumin']                  = isset($inputs['albumin']) ? $inputs['albumin'] : null;
            $params['rbc_value']                = isset($inputs['rbc_value']) ? $inputs['rbc_value'] : null;
            $params['casts_value']              = isset($inputs['casts_value']) ? $inputs['casts_value'] : null;
            $params['crystals']                 = isset($inputs['crystals']) ? $inputs['crystals'] : null;
            $params['epithelial_cell_min']      = isset($inputs['epithelial_cell_min']) ? $inputs['epithelial_cell_min'] : null;
            $params['epithelial_cell_max']      = isset($inputs['epithelial_cell_max']) ? $inputs['epithelial_cell_max'] : null;
            $params['epithelial_cell_status']   = isset($inputs['epithelial_cell_status']) ? $inputs['epithelial_cell_status'] : null;
            $params['pus_cell_min']             = isset($inputs['pus_cell_min']) ? $inputs['pus_cell_min'] : null;
            $params['pus_cell_max']             = isset($inputs['pus_cell_max']) ? $inputs['pus_cell_max'] : null;
            $params['pus_cell_status']          = isset($inputs['pus_cell_status']) ? $inputs['pus_cell_status'] : null;
            $params['ketones']                  = isset($inputs['ketones']) ? $inputs['ketones'] : null;
            $params['sg']                       = isset($inputs['sg']) ? $inputs['sg'] : null;
            $params['ph_value']                 = isset($inputs['ph_value']) ? $inputs['ph_value'] : null;
            $params['wbc_value']                = isset($inputs['wbc_value']) ? $inputs['wbc_value'] : null;
            $params['leucocytes']               = isset($inputs['leucocytes']) ? $inputs['leucocytes'] : null;
            $params['erythrocytes']             = isset($inputs['erythrocytes']) ? $inputs['erythrocytes'] : null;
            $params['taken_datetime']           = isset($inputs['taken_datetime']) ? $inputs['taken_datetime'] : null;

        } elseif ($phr == 'electrolyte') {
            //
            $params['sodium']           = isset($inputs['sodium']) ? $inputs['sodium'] : null;
            $params['potassium']        = isset($inputs['potassium']) ? $inputs['potassium'] : null;
            $params['chloride']         = isset($inputs['chloride']) ? $inputs['chloride'] : null;
            $params['bicarbonate']      = isset($inputs['bicarbonate']) ? $inputs['bicarbonate'] : null;
            $params['pH']               = isset($inputs['pH']) ? $inputs['pH'] : null;
            $params['taken_datetime']   = isset($inputs['taken_datetime']) ? $inputs['taken_datetime'] : null;

        } elseif ($phr == 'tumor-marker') {
            //
            $params['ca15_value']       = isset($inputs['ca15_value']) ? $inputs['ca15_value'] : null;
            $params['ca125_value']      = isset($inputs['ca125_value']) ? $inputs['ca125_value'] : null;
            $params['alpha_value']      = isset($inputs['alpha_value']) ? $inputs['alpha_value'] : null;
            $params['carcino_value']    = isset($inputs['carcino_value']) ? $inputs['carcino_value'] : null;
            $params['prostate_value']   = isset($inputs['prostate_value']) ? $inputs['prostate_value'] : null;
            $params['taken_datetime']   = isset($inputs['taken_datetime']) ? $inputs['taken_datetime'] : null;

        } elseif ($phr == 'liver') {
            //
            $params['alkaline_phosphate_value'] = isset($inputs['alkaline_phosphate_value']) ? $inputs['alkaline_phosphate_value'] : null;
            $params['total_bilirubin_value']    = isset($inputs['total_bilirubin_value']) ? $inputs['total_bilirubin_value'] : null;
            $params['sgpt']                     = isset($inputs['sgpt']) ? $inputs['sgpt'] : null;
            $params['sgot']                     = isset($inputs['sgot']) ? $inputs['sgot'] : null;
            $params['taken_datetime']           = isset($inputs['taken_datetime']) ? $inputs['taken_datetime'] : null;

        } elseif ($phr == 'thyroid') {
            //
            $params['tsh']              = isset($inputs['tsh']) ? $inputs['tsh'] : null;
            $params['tt4']              = isset($inputs['tt4']) ? $inputs['tt4'] : null;
            $params['ft4']              = isset($inputs['ft4']) ? $inputs['ft4'] : null;
            $params['ft3']              = isset($inputs['ft3']) ? $inputs['ft3'] : null;
            $params['total_t3']         = isset($inputs['total_t3']) ? $inputs['total_t3'] : null;
            $params['taken_datetime']   = isset($inputs['taken_datetime']) ? $inputs['taken_datetime'] : null;

        } elseif ($phr == 'serology') {
            //
            $params['hbsag_value']      = isset($inputs['hbsag_value']) ? $inputs['hbsag_value'] : null;
            $params['tpha_value']       = isset($inputs['tpha_value']) ? $inputs['tpha_value'] : null;
            $params['aso_titer_value']  = isset($inputs['aso_titer_value']) ? $inputs['aso_titer_value'] : null;
            $params['ra_value']         = isset($inputs['ra_value']) ? $inputs['ra_value'] : null;
            $params['crp_value']        = isset($inputs['crp_value']) ? $inputs['crp_value'] : null;
            $params['widal_value']      = isset($inputs['widal_value']) ? $inputs['widal_value'] : null;
            $params['vdrl_value']       = isset($inputs['vdrl_value']) ? $inputs['vdrl_value'] : null;
            $params['taken_datetime']   = isset($inputs['taken_datetime']) ? $inputs['taken_datetime'] : null;

        }

        return $params;
    }

    public function coronaVaccineList(){
        $url = $this->getCoronaVaccineListApi();
        $params = ['api_token' => $this->checkAuthenticatedUser()->access_token];

        $data['vaccine_list'] = [];

        $result = $this->getQueryArticleListDataApi($url, $params);
        if(isset($result->status_code) && $result->status_code == 200) {
            foreach ($result->vaccine as $vaccine){
                $data['vaccine_list'][] = $vaccine;
            }
        }

        return view('frontend.pages.phr.corona.index', $data);
    }

    public function createVaccine(){

        $url = $this->getCoronaVaccineNameApi();
        $params = ['api_token' => $this->checkAuthenticatedUser()->access_token];

        $data['name_list'] = [];
        $result = $this->getQueryArticleListDataApi($url, $params);

        if(isset($result->status_code) && $result->status_code == 200) {
            foreach ($result->name_list as $vaccine){
                $data['name_list'][$vaccine->name] = $vaccine->name;
            }
        }

        return view('frontend.pages.phr.corona.create', $data);
    }

    public function storeVaccine(Request $request){

        $first_vaccine_date  = $request->input('first_vaccine_date');
        $second_vaccine_date = $request->input('second_vaccine_date');

        $vaccine_name       = $request->input('name');
        $other_vaccine_name = $request->input('other_vaccine_name');
        if($other_vaccine_name){
            $vaccine_name = $other_vaccine_name;
        }

        $url    = $this->getCoronaVaccineStoreApi();
        $params = [
            'api_token'               => $this->checkAuthenticatedUser()->access_token,
            'first_vaccine_date'      => $first_vaccine_date,
            'second_vaccine_date'     => $second_vaccine_date,
            'vaccine_name'            => $vaccine_name,
            'is_1st_vaccine_complete' => isset($first_vaccine_date) ? 1 : 0,
            'is_2nd_vaccine_complete' => isset($second_vaccine_date) ? 1 : 0
        ];

        $result = $this->postDataFromApi($url, $params);

        if(isset($result->status_code) && $result->status_code == 200) {
            $data['success'] = 'Your Corona vaccination info created successfully';
            return redirect()->route('frontend.phr.corona.vaccine')->with('success', $data['success']);
        } else {
            $data['error'] = (isset($result->error) && isset($result->error->message)) ? $result->error->message : trans('strings.generic.error_messages.technical_error');
            return redirect()->route('frontend.phr.corona.vaccine')->with('error', $data['error']);
        }

    }

    public function editVaccine($id){
        $url = $this->getCoronaVaccineNameApi();
        $params = ['api_token' => $this->checkAuthenticatedUser()->access_token];

        $data['name_list'] = [];
        $data['vaccine']   = null;
        $result = $this->getQueryArticleListDataApi($url, $params);

        if(isset($result->status_code) && $result->status_code == 200) {
            foreach ($result->name_list as $vaccine){
                $data['name_list'][$vaccine->name] = $vaccine->name;
            }
        }

        $showUrl         = $this->getCoronaVaccineShowApi($id);
        $resultResponse  = $this->getQueryArticleListDataApi($showUrl, $params);
        if(isset($resultResponse->status_code) && $resultResponse->status_code == 200) {
            $data['vaccine'] = $resultResponse->vaccine;
        }
        return view('frontend.pages.phr.corona.edit', $data);
    }

    public function updateVaccine(Request $request, $id){

        $first_vaccine_date  = $request->input('first_vaccine_date');
        $second_vaccine_date = $request->input('second_vaccine_date');

        $vaccine_name       = $request->input('name');
        $other_vaccine_name = $request->input('other_vaccine_name');
        if($other_vaccine_name){
            $vaccine_name = $other_vaccine_name;
        }

        $url    = $this->getCoronaVaccineShowApi($id);
        $params = [
            'api_token'               => $this->checkAuthenticatedUser()->access_token,
            'first_vaccine_date'      => $first_vaccine_date,
            'second_vaccine_date'     => $second_vaccine_date,
            'vaccine_name'            => $vaccine_name,
            'is_1st_vaccine_complete' => isset($first_vaccine_date) ? 1 : 0,
            'is_2nd_vaccine_complete' => isset($second_vaccine_date) ? 1 : 0
        ];

        $result = $this->patchDataFromApi($url, $params);

        if(isset($result->status_code) && $result->status_code == 200) {
            $data['success'] = 'You Corona vaccination info updated successfully';
            return redirect()->route('frontend.phr.corona.vaccine')->with('success', $data['success']);
        } else {
            $data['error'] = (isset($result->error) && isset($result->error->message)) ? $result->error->message : trans('strings.generic.error_messages.technical_error');
            return redirect()->route('frontend.phr.corona.vaccine')->with('error', $data['error']);
        }

    }

    public function deleteVaccine($id){

        $url         = $this->getCoronaVaccineShowApi($id);
        $params      = ['api_token' => $this->checkAuthenticatedUser()->access_token];

        $result  = $this->destroyDataFromApi($url, $params);;

        if(isset($result->status_code) && $result->status_code == 200) {
            return redirect()->route('frontend.phr.corona.vaccine')->with('success', 'Successfully record deleted');
        } else {
            return redirect()->route('frontend.phr.corona.vaccine')->with('error', $result->error->message);
        }

    }
}
