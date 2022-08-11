<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\ApiAuthenticatedListController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserReactionController extends ApiAuthenticatedListController
{
    public function userReaction($type, $id)
    {
        $type = trim(strtolower($type));
        $typeArray = array('hospital', 'doctor', 'blog', 'health-tips');
        if(! in_array($type, $typeArray)) {
            return false;
        }
        $url                  = $this->userReactionApiUrl($type);
        $input['id']          = $id;
        $input['api_token']   = decrypt(\Cookie::get('_tn')); // session('user')->access_token;
        $result               = $this->updateDataFromApi( $url , $input);
        if(isset($result->status_code) && $result->status_code == 200)
        {
            return $result->message;
        } else {
            return 'false';
        }

    }
}
