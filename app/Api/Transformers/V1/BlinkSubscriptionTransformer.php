<?php

namespace App\Api\Transformers\V1;

use App\Api\Transformers\Transformer;
use Carbon\Carbon;

class BlinkSubscriptionTransformer extends Transformer
{

    public function transform($data) {
        return [
            'api_token'                 => decrypt(session('user'))->access_token,
            'customer_name'             => $data->customer_name,
            'customer_membership_id'    => $data->membership_id,
//            'customer_date_of_birth'    => $data->date_of_birth,
            'customer_date_of_birth'    => Carbon::parse($data->date_of_birth)->format('Y-m-d'),
            'customer_gender'           => $data->gender,
            'customer_mobile'           => $this->formatMobileNumber($data->mobile_number),
            'nominee_name'              => $data->nominee_name,
            'customer_nominee_relation' => $data->nominee_relation,
            'plan_slug'                 => $data->plan_slug,
            'platform'                  => 'Website'
        ];
    }

    public function formatMobileNumber($mobileNumber){
        return "+880".substr($mobileNumber, -10, 10);
    }
}
