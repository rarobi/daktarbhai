<?php

namespace App\Services;
use App\Http\Controllers\ApiListController;
use PDF;
/**
 * Class CustomDropdowns
 * @package App\Services\Macros
 */
trait DownloadPdf
{
    /**
     * @param  $name
     * @param  null     $selected
     * @param  array    $options
     * @return string
     */


    public function downloadSubscriptionInvoiceDetails($user, $url, $params) {

        $data['user'] = $user;

        $subscriptionHistoryUrl = $url;
        $apiListing  =   new ApiListController();

        $result = $apiListing->getQueryArticleListDataApi($subscriptionHistoryUrl, $params);
        if(isset($result->status_code) && $result->status_code == 200) {
            $data['invoicesInformation']= $result->subscription_history;
            $invoice_name = $this->getInvoiceName($data['user'], $data['invoicesInformation']);
            $data['invoice_name']   =   $invoice_name;
            /*$pdf = \PDF::loadView('frontend.pages.subscription.invoice.create', $data);
            return $pdf->download($invoice_name);*/
            return $data;
        } else {
            return [];

        }
    }


    private function getInvoiceName($user, $invoicesInformation) {
//        dd($user->username);
        if(isset($user->name)) {
            $name = str_slug($user->name);
        }else {
            $name = $user->username;
        }
        if(isset($invoicesInformation->plan_name)) {
            $plan = $invoicesInformation->plan_name;
        } else {
            $plan = 'Not_Provided';
        }
        $invoicesName = $name.'_'.$plan.'.pdf';
        return $invoicesName;
    }

}