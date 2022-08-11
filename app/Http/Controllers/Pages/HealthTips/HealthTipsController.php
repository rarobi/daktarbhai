<?php

namespace App\Http\Controllers\Pages\HealthTips;

use App\Http\Controllers\ApiListController;
use Illuminate\Http\Request;

class HealthTipsController extends ApiListController
{
    protected $limit;
    protected $recentHealthTips;
    protected $categoryLists;
    /**
     * HealthTipsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->limit            = 12;
        $params                        = [
            'page'          => 1,
            'platform'      => 'web',
            'limit'         => 3
        ];
        $healthtipsUrl          = $this->getHealthTipsDataApi();
        $this->recentHealthTips = $this->getQueryArticleListDataApi($healthtipsUrl, $params);
    }

    public function index($category=null, $page = null)
    {
        if($category != null) {
            $url = $this->getHealthTipsByCategory($category);
            $data['category_id'] = $category;
        } else {
            $url = $this->getHealthTipsDataApi();
        }

        $categoryUrl                   = $this->getHealthtipsCategoryList();
        $params                        = [
            'page'          => $page,
            'platform'      => 'web',
            'limit'         => $this->limit
        ];
        $categoryList = $this->getDataFromApi($categoryUrl);
        $healthTips   = $this->getQueryArticleListDataApi($url, $params);

        $data['sectionQuestionForm'] = true;

        $data['selectedCategory'] = isset($healthTips->selected->category) ? $healthTips->selected->category : null;

        if( $healthTips  != null && isset($healthTips->health_tips) && count($healthTips->health_tips)) {
            $data['healthTips']        = $healthTips->health_tips;
            $data['paginator']         = isset($healthTips->paginator) ? $healthTips->paginator : null;
            $data['categories']        = (isset($categoryList->categories) && $categoryList->categories != null) ? $categoryList->categories : null;
            $data['recent_healthTips'] = isset($this->recentHealthTips->health_tips) ? $this->recentHealthTips->health_tips : null;
//            dd($data);
            return view('frontend.pages.healthtips.index', $data);
        } else if(isset($healthTips->status_code) && $healthTips->status_code == 500) {
            abort(500);
        } else {
            abort(404);
        }

    }

    public function indexWithPagination( $page = 1)
    {
        $url = $this->getHealthTipsDataApi();

        $categoryUrl                   = $this->getHealthtipsCategoryList();
        $params                        = [
            'page'          => $page,
            'platform'      => 'web',
            'limit'         => $this->limit
        ];

        $categoryList = $this->getDataFromApi($categoryUrl);

        $healthTips       = $this->getQueryArticleListDataApi($url, $params);

        $data['sectionQuestionForm'] = true;

        if( $healthTips  != null && isset($healthTips->health_tips) && count($healthTips->health_tips)) {
            $data['healthTips']        = $healthTips->health_tips;
            $data['paginator']         = isset($healthTips->paginator) ? $healthTips->paginator : null;
            $data['categories']        = (isset($categoryList->categories) && $categoryList->categories != null) ? $categoryList->categories : null;
            $data['recent_healthTips'] = isset($this->recentHealthTips->health_tips) ? $this->recentHealthTips->health_tips : null;
//            dd($data);
            return view('frontend.pages.healthtips.index', $data);
        } else if(isset($healthTips->status_code) && $healthTips->status_code == 500) {
            abort(500);
        } else {
            abort(404);
        }

    }

    public function show($id)
    {
        $url              =   $this->getSpecificHealthTipsDataApi($id);
        $healthTips       =   $this->getDataFromApi($url);
        $categoryUrl      =   $this->getHealthtipsCategoryList();
        $categoryList     =   $this->getDataFromApi($categoryUrl);

        if( $healthTips != null && isset($healthTips->health_tip) && count($healthTips->health_tip)) {
            $data['healthTip']         = $healthTips->health_tip;
            $data['paginator']         = isset($healthTips->paginator) ? $healthTips->paginator : null;
            $data['categories']        = (isset($categoryList->categories) && $categoryList->categories != null) ? $categoryList->categories : null;
            $data['recent_healthTips'] = isset($this->recentHealthTips->health_tips) ? $this->recentHealthTips->health_tips : null;
//            dd($data);
            return view('frontend.pages.healthtips.show', $data);
        } else if(isset($healthTips->status_code) && $healthTips->status_code == 500) {
            abort(500);
        } else {
            abort(404);
        }

    }

    public function search(Request $request, $page = null)
    {
        $search                 = trim($request->search);
        $data['search']         = $search;
        $categoryUrl            = $this->getHealthtipsCategoryList();
        $categoryList           = $this->getDataFromApi($categoryUrl);
        $url                    = $this->getHealthTipsDataApi();
        $params                 = [
            'q'             => $search,
            'page'          => $request->page,
            'platform'      => 'web',
            'limit'         => $this->limit
        ];

        $healthTips                 = $this->getQueryArticleListDataApi($url, $params);

        if($healthTips  != null && isset($healthTips->health_tips)) {
//            dd($healthTips);
            $data['healthTips']        = $healthTips->health_tips;
            $data['paginator']         = isset($healthTips->paginator) ? $healthTips->paginator : null;
            $data['categories']        = (isset($categoryList->categories) && $categoryList->categories != null) ? $categoryList->categories : null;
            $data['recent_healthTips'] = isset($this->recentHealthTips->health_tips) ? $this->recentHealthTips->health_tips : null;
            $data['query_string']      = "search=$search&page=".$page;
//            dd($data);
            return view('frontend.pages.healthtips.index', $data);
        } else if(isset($healthTips->status_code) && $healthTips->status_code == 500){
            abort(500);
        } else {
            abort(404);
        }

        return view('frontend.pages.healthtips.index', $data);

    }
}
