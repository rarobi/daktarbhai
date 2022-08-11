<?php

namespace App\Http\Controllers\Pages\AskDoctor;

use App\Http\Requests\Pages\AskDoctorRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiListController;

use Illuminate\Support\Facades\Cache;
use Session;

class AskDoctorController extends ApiListController
{
    protected $topics;
    protected $featured_questions;
    protected $limit;
    protected $questionTopics;
    protected $all_questions;

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

    public function index()
    {
        $data['all_questions']      =  isset($this->all_questions->askQuestions) ? $this->all_questions->askQuestions : null;
        $data['questions']          = is_null($data['all_questions'])?$data['all_questions']:array_slice($data['all_questions'], 0 , 8);
    
        // $cacheTopics              = Cache::get('ask_a_doctor_topics');
        //  dd($cacheTopics);
        // if($cacheTopics){
        //     $data['topics'] = json_decode($cacheTopics);
        // } else { 
        //     $topicsUrl                  =  $this->getTopicsList();
        //     $this->topics               =  $this->getDataFromApi($topicsUrl);
        //     $data['topics']             = isset($this->topics->topics) ? $this->topics->topics : null;

        //     Cache::put('ask_a_doctor_topics', json_encode($data['topics']), 24*60*60); // For 1 day
        // }


        // $data['questions']          = is_null($data['all_questions'])?$data['all_questions']:array_slice($data['all_questions'], 0 , 8);

        $data['topics']             = isset($this->topics->topics) ? $this->topics->topics : null;
        $data['questionTopics']     = isset($this->questionTopics->topics) ? $this->questionTopics->topics : null;
        $data['featured_questions'] = isset($this->featured_questions->askQuestions) ? $this->featured_questions->askQuestions : null;

        if(session('user'))
        {
            $data['user']   =   decrypt(session('user'));
        }

        return view('frontend.pages.askdoctor.index', $data);
    }

    public function indexRedirect(Request $request) {
        $question_info = $request->only('description');
        return redirect()->route('frontend.questionform')->with('question_info',$question_info);
    }

    public function questionForm() {
        $data['topics']       = isset($this->topics->topics) ? $this->topics->topics : null;
        return view('frontend.pages.askdoctor.questionform', $data);
    }

    public function allQuestions($page = null)
    {
        $data['topics']             = isset($this->topics->topics) ? $this->topics->topics : null;
        $data['questionTopics']     = isset($this->questionTopics->topics) ? $this->questionTopics->topics : null;
        $data['featured_questions'] = isset($this->featured_questions->askQuestions) ? $this->featured_questions->askQuestions : null;

        $params                        = [
            'page'          => $page,
            'platform'      => 'web',
            'limit'         => $this->limit
        ];

        if(isset($id) && $id !=null) {
            $data['id'] = $id;
            $url = $this->getQuestionsWithTopics($id);
            $result = $this->getQueryArticleListDataApi($url, $params);

            if($result != null && $result->status_code == 200 && $result->askQuestions != null) {
                $data['all_questions'] = isset($result->askQuestions) ? $result->askQuestions : null;
                $data['paginator']     = isset($result->paginator) ? $result->paginator : null;
            } else if($result->status_code == 500) {
                abort(500);
            } else {
                abort(404);
            }

        } else {
            $url = $this->getAllQuestions();
            $result = $this->getQueryArticleListDataApi($url, $params);
            $data['all_questions']      =  isset($result->askQuestions) ? $result->askQuestions : null;
            $data['paginator']          = isset($result->paginator) ? $result->paginator : null;
        }

        $data['first_page'] = $this->current_page = 1;

        return view('frontend.pages.askdoctor.all_questions', $data);
    }

    public function topicQuestions($id = null, $page = null)
    {
        $data['topics']             = isset($this->topics->topics) ? $this->topics->topics : null;
        $data['questionTopics']     = isset($this->questionTopics->topics) ? $this->questionTopics->topics : null;
        $data['featured_questions'] = isset($this->featured_questions->askQuestions) ? $this->featured_questions->askQuestions : null;

        $params                        = [
            'page'          => $page,
            'platform'      => 'web',
            'limit'         => $this->limit
        ];

        if(isset($id) && $id !=null) {
            $data['id'] = $id;
            $url = $this->getQuestionsWithTopics($id);
            $result = $this->getQueryArticleListDataApi($url, $params);
            if ($result != null && $result->status_code == 200 && $result->askQuestions != null) {
                $data['all_questions'] = isset($result->askQuestions) ? $result->askQuestions : null;
                $data['paginator'] = isset($result->paginator) ? $result->paginator : null;
            } else if($result->status_code == 500) {
                abort(500);
            } else {
                abort(404);
            }
        }

        $data['first_page'] = $this->current_page = 1;

        return view('frontend.pages.askdoctor.all_questions', $data);
    }

    public function questionDetails($id)
    {
        $data['topics']             = isset($this->topics->topics) ? $this->topics->topics : null;
        $data['questionTopics']     = isset($this->questionTopics->topics) ? $this->questionTopics->topics : null;
        $data['featured_questions'] = isset($this->featured_questions->askQuestions) ? $this->featured_questions->askQuestions : null;
        $url                        = $this->getQuestionDetails($id);
        if(\Cookie::has('_tn')) {
            $input['api_token']   = decrypt(\Cookie::get('_tn'));
            $result        = $this->getQueryArticleListDataApi($url, $input);
        } else {
            $result        = $this->getQueryArticleListDataApi($url);
        }
//        $result                     = $this->getDataFromApi($url);

        if($result != null && $result->status_code == 200 && $result->askQuestion != null) {
            $data['askquestion'] = $result->askQuestion;
            $data['related']     = $result->related;

            if($data['related'] != null) {
                $data['featured_questions'] = isset($data['related']->questions) ? $data['related']->questions : null;
            }

            return view('frontend.pages.askdoctor.show', $data);

        } else if($result->status_code == 500) {
            abort(500);
        } else {
            abort(404);
        }
    }

    public function questionEdit($id)
    {
        $data['topics']             = isset($this->topics->topics) ? $this->topics->topics : null;

        $data['questionTopics']     = isset($this->questionTopics->topics) ? $this->questionTopics->topics : null;
//        $data['featured_questions'] = isset($this->featured_questions->askQuestions) ? $this->featured_questions->askQuestions : null;
        $url                        = $this->getQuestionDetails($id);
        if(\Cookie::has('_tn')) {
            $input['api_token']   = decrypt(\Cookie::get('_tn'));
            $result        = $this->getQueryArticleListDataApi($url, $input);
        } else {
            $result        = $this->getQueryArticleListDataApi($url);
        }
//        $result                     = $this->getDataFromApi($url);

        if($result != null && $result->status_code == 200 && $result->askQuestion != null) {
            $data['askquestion'] = $result->askQuestion;
            $data['id']          = $id;
//               dd( $data['askquestion']);
            $data['related']     = $result->related;

            if($data['related'] != null) {
                $data['featured_questions'] = isset($data['related']->questions) ? $data['related']->questions : null;
            }

            return view('frontend.pages.askdoctor.questionEditform', $data);

        } else if($result->status_code == 500) {
            abort(500);
        } else {
            abort(404);
        }
    }


    public function updateQuestion(AskDoctorRequest $request,$id)
    {
//        if (session('user')) {
        if (\Cookie::has('_tn')) {

      //    dd($request->all());

            $topic                = [ "topics" =>  [$request->topics]];
            $url                  = $this->updateQuestionToDoctorAPi($id);

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
          // dd($input);

            $result               = $this->updateDataFromApi( $url , $input);
           // dd($result);
            if($result != null && $result->status_code == 200) {
                $data['question_id']    =   $id;
                $data['submit']  = 1;
                $data['status']  = 200;
                $data['success'] = 'Question is successfully updated and will be posted soon, pending approval from administrator.
                                    Thank you for your patience.';

                if(session('question_info')) {
                    Session::forget('question_info');
                }
//               return response()->json($data);
                return redirect('/profile/my-questions')->with('success', $data['success']);

            } else if($result->status_code == 500) {
                abort(500);
            }  else {
                $data['error'] = (isset($result->error->message) && $result->error->message != null) ? $result->error->message : 'some technical problem';
            }
            $user = decrypt(session('user'));
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
}
