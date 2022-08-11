<?php
namespace App\Http\Controllers\Api;
/**
 * Created by PhpStorm.
 * User: rashed
 * Date: 8/6/18
 * Time: 2:47 PM
 */
use App\Http\Controllers\ApiListController;
use Illuminate\Http\Request;
use App\Services\DownloadPdf;
class SubscriptionInvoice extends ApiListController
{
use DownloadPdf;



    /*
     * Bad practice
     * Need to change its location
     * */
    public function downloadInvoiceApp(Request $request) {

        try {

            if(!$request->has('api_token')) {
                throw new \Exception('User details required');
            }

            if(!$request->has('invoice_id') || is_null($request->input('invoice_id'))) {
                throw new \Exception('Please provide valid invoice information');
            }

            $invoiceId  =   $request->input('invoice_id');

            $params                        = [
                'api_token'          => $request->input('api_token'),
            ];

            // get authenticated user

            $myProfileUrl = $this->getProfileInfoApi();

            $profileApiResult = $this->getQueryArticleListDataApi($myProfileUrl, $params);

            if(isset($profileApiResult->status_code) && $profileApiResult->status_code == 200) {
                $user = $profileApiResult->user;

                $subscriptionHistoryUrl = $this->getMySubscriptionHistoryDetail($invoiceId);

                $invoiceInformation = $this->downloadSubscriptionInvoiceDetails($user, $subscriptionHistoryUrl, $params);

                if(count($invoiceInformation) > 0) {
                    $pdf = \PDF::loadView('frontend.pages.subscription.invoice.create', $invoiceInformation);
                    return $pdf->download($invoiceInformation['invoice_name']);
                } else {
                    $data['status_code'] = 400;
                    $data['status'] = 'failed';
                    $data['message']    =  'failed to download invoice';
                    return response()->json($data);
                }

            } else {
                $msg = 'No authenticated user found';
                $data['status_code'] = 400;
                $data['status'] = 'failed';
                $data['message']    =  $msg;
                return response()->json($data);
            }

        } catch(\Exception $e) {
            $msg = $e->getMessage();
            $data['status_code'] = 400;
            $data['status'] = 'failed';
            $data['message']    =  $msg;
            return response()->json($data);

        }




    }

    public function getMySubscriptionHistoryDetail($id)
    {
        return $this->prefix.'/subscription/history'.'/'.$id;
    }

    public function getProfileInfoApi()
    {
        return $this->prefix.'/user/profile';
    }
}