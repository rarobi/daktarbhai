<?php
namespace App\Http\Controllers\Api;
/**
 * Created by PhpStorm.
 * User: rashed
 * Date: 8/6/18
 * Time: 2:47 PM
 */
use App\Http\Controllers\ApiListController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\DownloadPdf;
use Mpdf\Mpdf;

class PrescriptionDetails extends ApiListController
{
use DownloadPdf;



    /*
     * Bad practice
     * Need to change its location
     * */
    public function downloadPrescriptionApp(Request $request) {

        try {

            if(!$request->has('api_token')) {
                throw new \Exception('User details required');
            }

            if(!$request->has('prescription_id') || is_null($request->input('prescription_id'))) {
                throw new \Exception('Please provide valid precription information');
            }

            $invoiceId  =   $request->input('prescription_id');

            $params                        = [
                'api_token'          => $request->input('api_token'),
            ];

            // get authenticated user

            $myPrescriptionUrl = $this->getMyPrescriptionDetails($invoiceId);

            $result = $this->getQueryArticleListDataApi($myPrescriptionUrl, $params);

            $data['myPrescription'] = isset($result->patientVital) ? $result->patientVital : null;

            $data['rootUrl'] = 'profile/prescription/download/{id}';

            $date = Carbon::parse($data['myPrescription']->prescription_date)->format('j F Y');
//            $pdf = \PDF::loadView('frontend.pages.profile.my-prescription-pdf', $data);
//            // return view('prescription::prescriptions.prescriptionpdf');
//            /*$dateTime   = date("Y-m-d H-i");*/
            $prefix_name = str_limit($data['myPrescription']->practitioner_name, 3,'');
            $fileName    =str_slug($prefix_name.' '.$data['myPrescription']->patient_code.' '.$date).'.pdf';
//
//            return $pdf->download($fileName);

//            $currentTime = Carbon::now();

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

            $contents = view('frontend.pages.profile.my-prescription-pdf', $data)->render();

//            return $mpdf->download($fileName);

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
//            $mpdf->Output($fileName . '.pdf', 'D');
            $mpdf->Output(str_slug($prefix_name.' '.$data['myPrescription']->patient_code.' '.$date) . '.pdf', 'I');

        } catch(\Exception $e) {
            $msg = $e->getMessage();
            $data['status_code'] = 400;
            $data['status'] = 'failed';
            $data['message']    =  $msg;
            return response()->json($data);

        }




    }

    public function getMyPrescriptionDetails($id)
    {
        return $this->prefix.'/user/prescription/details/'.$id;
    }

    public function getProfileInfoApi()
    {
        return $this->prefix.'/user/profile';
    }
}