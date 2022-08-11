<?php

namespace App\Http\Controllers\Pages\AskDoctor;

//use App\Http\Controllers\Frontend\ApiAuthenticatedListController;
use App\Http\Controllers\ApiListController;
use App\Http\Requests\Pages\AskDoctorRequest;
use Illuminate\Http\Request;

use Session;

//class AskDoctorQuestionController extends ApiAuthenticatedListController
class AskDoctorQuestionController extends ApiListController

{
    protected $topics;
    protected $featured_questions;
    protected $limit;
    //

    /**
     * AskDoctorController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $topicsUrl                  =  $this->getTopicsList();
        $this->topics               =  $this->getDataFromApi($topicsUrl);
        $questionTopicsUrl          =  $this->getQuestionTopicsList();
        $this->questionTopics       =  $this->getDataFromApi($questionTopicsUrl);
        $featured_question_url      =  $this->getFeaturedQuestions();
        $this->featured_questions   =  $this->getDataFromApi($featured_question_url);
        $allQuestions_url           =  $this->getAllQuestions();
        $this->all_questions        =  $this->getDataFromApi($allQuestions_url);
        $this->limit                = 8;
    }

    /**
     * @param AskDoctorRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postQuestion(AskDoctorRequest $request)
    {
//        dd($request->all());
//        if (session('user')) {
        if (\Cookie::has('_tn')) {

            $url                  = $this->postQuestionToDoctorAPi();

            $input = $this->manageQuestionInput($request);
//            dd($input);
            $result               = $this->postDataFromApi( $url , $input);

            if($result != null && $result->status_code == 200) {
                $data['questionResponse'] = $result;
                $data['submit']  = 1;
                $data['success'] = 'Question is successfully submitted and will be posted soon, pending approval from adminstrator.
                                    Thank you for your patience.';

                if(session('question_info')) {
                    Session::forget('question_info');
                }
            } else if($result->status_code == 500) {
                abort(500);
            }  else {
                $data['error'] = (isset($result->error->message) && $result->error->message != null) ? $result->error->message : 'some technical problem';
            }
            $user = decrypt(session('user'));

//            if(isset($height->unit) && $height->unit != null) {
//                if ($height->unit == 'feet') {
//                    $height['unit'] = 'feet';
//                    $inches = ($height->value)*12;
//                    $height['height'] = $inches* 2.54;
//                }
//            }

        if($user->age == null || $user->gender == null) {
            if($request->has('age') || $request->has('gender')){
                $profileInput['api_token']      = $input['api_token'];

                if($user->age == null) {
                    if ($request->has('age')) {
                        $age = $request->age;
                        $nextWeek = time() - $age * 365 * 24 * 60 * 60;
                        $birthDate = date('Y-m-d', $nextWeek);
                        $profileInput['date_of_birth'] = $birthDate;
                    }
                }

                if($user->gender == null) {
                    if($request->has('gender')) {
                        $profileInput['gender']         = $request->gender;
                    }
                }

                $url = $this->postProfileUpdateApi();
                $this->patchDataFromApi($url, $profileInput);
            }
        }
        } else {
            $question_info = $request->all();
            if(session('question_info')) {
                Session::forget('question_info');
            }
            session(['question_info' => $question_info]);
            $data['error'] = 'sign-in';
        }
        return $data;
    }

    public function postReactionOnAnswer($answerId, $reaction ) {
        $input['api_token']   = decrypt(\Cookie::get('_tn'));
        $input['answer_id']   = $answerId;
        $input['reaction']    = $reaction;
        $url = $this->postAnswerReactionApi();
        $result = $this->updateDataFromApi($url, $input);
        if(isset($result) && $result->status_code == 200) {
            return redirect()->back();
        } else {
            return redirect()->back();
//            abort(404);
        }
//        dd($result);
    }

    private function manageQuestionInput($request) {
        $topic                = [ "topics" =>  [$request->topics]];
        $input['api_token']   = decrypt(\Cookie::get('_tn')); // session('user')->access_token;
        $input['description'] = $request->description;
        $input['topics']      = json_encode($topic);
        $input['is_private']  = $request->is_private;
        $input['gender'] = $request->gender;
        $input['age'] = $request->age;

        if($request->has('fever')) {
            $input['fever'] = $request->fever;
        }

        if($request->has('hypertensive')) {
            $input['hypertensive'] = $request->hypertensive;
        }
        if($request->has('allergic')) {
            $input['allergic'] = $request->allergic;
        }
        if($request->has('height')) {
            $input['height'] = $request->height;
        }
        if($request->has('weight')) {
            $input['weight'] = $request->weight;
        }
        if($request->has('chronic')) {
            $input['chronic'] = $request->chronic;
        }
        if($request->has('drugs')) {
            $input['drugs'] = $request->drugs;
        }
        return $input;
    }

}
