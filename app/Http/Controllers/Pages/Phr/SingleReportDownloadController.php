<?php

namespace App\Http\Controllers\Pages\Phr;

use App\Http\Controllers\ApiAuthenticatedListController;
use Illuminate\Http\Request;
use Mpdf\Mpdf;


class SingleReportDownloadController extends ApiAuthenticatedListController
{
    protected $authenticatedUser;
    protected $collectionName;

    public function downloadSinglePhr(Request $request)
    {
        $phrName    = $request->input('phr_name');
        $phrId      = $request->input('phr_id');

        $params = [
            'api_token' => $this->checkAuthenticatedUser()->access_token,
            'options' => [
                'bmi' => 1,
                'bp' => 1
            ]
        ];

        $bmiPhr     = $this->editPhrApi($phrName, $phrId);
        $result     = $this->getQueryArticleListDataApi($bmiPhr, $params);

        $allPhr         = $this->getAllPhrReportApi();
        $allPhrResult   = $this->getQueryArticleListDataApi($allPhr, $params);

        if(isset($result->status_code) && $result->status_code == 200) {

            if(isset($allPhrResult->bmi->bmiRecord) && count($allPhrResult->bmi->bmiRecord)) {
                foreach ($allPhrResult->bmi->bmiRecord as $bmiRecord) {
                    $data['lastBmiData']    = $bmiRecord;
                    break;
                }
            }

            if(isset($allPhrResult->bp->bpRecord) && count($allPhrResult->bp->bpRecord)) {
                foreach ($allPhrResult->bp->bpRecord as $bpRecord) {
                    $data['lastBpData']    = $bpRecord;
                    break;
                }
            }

            if (isset($result->bmiRecord)) {
                $data['bmiData']     = $result->bmiRecord;
                $data['height']         = $data['bmiData']->height_obj->feet. ' Feet ';
                if($data['bmiData']->height_obj->inch != 0) {
                    $data['height'] .= $data['bmiData']->height_obj->inch. 'inches';
                }
                $data['reportDate'] = $data['bmiData']->report_datetime;
            }

            if (isset($result->bpRecord)) {
                $data['bpData']     = $result->bpRecord;
                $data['reportDate'] = $data['bpData']->report_datetime;
            }

            if (isset($result->cbcRecord)) {
                $data['cbcData']     = $result->cbcRecord;
                $data['reportDate']  = $data['cbcData']->report_datetime;
            }

            if (isset($result->glucoseRecord)) {
                $data['glucoseData']    = $result->glucoseRecord;
                $data['reportDate']     = $data['glucoseData']->report_datetime;
            }

            if (isset($result->kidneyRecord)) {
                $data['kidneyData']     = $result->kidneyRecord;
                $data['reportDate']     = $data['kidneyData']->report_datetime;
            }

            if (isset($result->lipidRecord)) {
                $data['lipidData']      = $result->lipidRecord;
                $data['reportDate']     = $data['lipidData']->report_datetime;
            }

            if (isset($result->urineRecord)) {
                $data['urineProfileData']   = $result->urineRecord;
                $data['reportDate']         = $data['urineProfileData']->report_datetime;
            }

            if (isset($result->electrolyteRecord)) {
                $data['electrolyteData']        = $result->electrolyteRecord;
                $data['electrolyteDataRange']   = $result->range;
                $data['reportDate']             = $data['electrolyteData']->report_datetime;
            }

            if (isset($result->tumorRecord)) {
                $data['tumorMarkerData']    = $result->tumorRecord;
                $data['reportDate']         = $data['tumorMarkerData']->report_datetime;
            }

            if (isset($result->liverRecord)) {
                $data['liverData']    = $result->liverRecord;
                $data['reportDate']   = $data['liverData']->report_datetime;
            }

            if (isset($result->serologyRecord)) {
                $data['serologyData'] = $result->serologyRecord;
                $data['reportDate']   = $data['serologyData']->report_datetime;
            }

            if (isset($result->thyroidRecord)) {
                $data['thyroidData'] = $result->thyroidRecord;
                $data['reportDate']   = $data['thyroidData']->report_datetime;
            }

            $data['userData']       = $this->checkAuthenticatedUser();
            $data['phrName']        = $phrName;

        } else {
            $data['error'] = trans('strings.generic.error_messages.data_not_found');
        }

//        $pdf = \PDF::loadView('frontend.pages.phr.phr-report', $data);
        $dateTime   = date("Y-m-d-H-i-s");
//        $fileName    = $data['phrName'].'_of_'.$data['userData']->username.'_'.$dateTime.'.pdf';
//        return $pdf->download($fileName);

        $mpdf = new mPDF([
            'tempDir' => storage_path('app/public/fonts'),
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

        $contents = view('frontend.pages.phr.phr-report', $data)->render();

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
        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);

        $mpdf->SetCompression(true);
        $mpdf->Output($data['phrName'].'_of_'.$data['userData']->username.'_'.$dateTime. '.pdf', 'D');
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

    protected function getModuleCollectionName()
    {
        return $this->collectionName;
    }

}
