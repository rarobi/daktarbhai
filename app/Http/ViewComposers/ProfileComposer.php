<?php

namespace App\Http\ViewComposers;

use App\Http\Controllers\ApiAuthenticatedListController;

use Carbon\Carbon;
use Illuminate\View\View;

class ProfileComposer extends ApiAuthenticatedListController
{
    /**
     * The user repository implementation.
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // issue arises in backend if session data not needed to use

        if(\Cookie::has('_tn')) {

            if(session('user')) {
                $user = decrypt(session('user'));
            } else {
                $myProfileUrl = $this->getProfileInfoApi();
                $params                        = [
                    'api_token'          => decrypt(\Cookie::get('_tn')) // session('user')->access_token
                ];

                $result = $this->getQueryArticleListDataApi($myProfileUrl, $params);

                if($result->status_code == 200) {
                    $user = $result->user;
                    session(['user' => encrypt($user)]);
                } else {

                    \Cookie::queue(\Cookie::forget('_tn'));
                }
            }

            if (isset($user)) {
                if($user->date_of_birth != null) {
                    $diff = abs(strtotime(Carbon::now()) - strtotime($user->date_of_birth));
                    $user->ageValue = floor($diff / (365*60*60*24));
                } else {
                    $user->ageValue = null;
                }
                $view->with('logged_in_api_user', $user);
            }
        }
    }
}