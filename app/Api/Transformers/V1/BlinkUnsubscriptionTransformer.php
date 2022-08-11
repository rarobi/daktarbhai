<?php

namespace App\Api\Transformers\V1;

use App\Api\Transformers\Transformer;

class BlinkUnsubscriptionTransformer extends Transformer
{

    public function transform($data) {
        return [
            'api_token'                 => decrypt(session('user'))->access_token,
            'customer_membership_id'    => trim($data->customer_membership_id),
            'customer_mobile'           => trim($data->customer_mobile),
            'plan_slug'                 => trim($data->plan_slug),
            'unsubscription_platform'   => 'Website',
        ];
    }
}
