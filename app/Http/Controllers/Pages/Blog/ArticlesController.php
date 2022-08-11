<?php

namespace App\Http\Controllers\Pages\Blog;

use App\Http\Controllers\ApiListController;
//use App\Http\Requests\Request;
use Illuminate\Http\Request;

class ArticlesController extends ApiListController
{

    protected $popularArticles;
    protected $recentArticles;
    protected $featuredArticles;
    protected $categoryLists;
    protected $limit;

    /**
     * ArticlesController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $recentArticleUrl       = $this->prefix.'/blog?q=recent';
        $this->recentArticles   = $this->getDataFromApi($recentArticleUrl);

        $featuredArticleUrl     = $this->prefix.'/blog?q=featured';
        $this->featuredArticles = $this->getDataFromApi($featuredArticleUrl);

        $popularArticleUrl     = $this->prefix.'/blog/popular';
        $this->popularArticles = $this->getDataFromApi($popularArticleUrl);

        $categoryUrl            = $this->prefix.'/category?with=articles';
        $this->categoryLists    = $this->getDataFromApi($categoryUrl);
        $this->limit            = 6;

    }

    /**
     * Display a listing of the resource.
     *
     * @param null $categoryId
     * @param null $page
     * @return \Illuminate\Http\Response
     */
    public function index($categoryId = null , $page = null)
    {
        if($categoryId != null) {
            $url = $this->getBlogArticlesByCategoryApi($categoryId, $page, $this->limit);
            $data['category_id'] = $categoryId;
        } else {
            $url = $this->getBlogArticleDataWithPagination($page, $this->limit);
        }
        $data['articles_result']       = $this->getDataFromApi($url);
        $data['selectedCategory'] = isset($data['articles_result']->selected->category) ? $data['articles_result']->selected->category : null;

        if ($data['articles_result'] != null && isset($data['articles_result']->blogs) && $data['articles_result']->blogs != null){
            $data['articles']              = isset($data['articles_result']->blogs) ? $data['articles_result']->blogs : null;
            $data['paginator']             = isset($data['articles_result']->paginator) ? $data['articles_result']->paginator : null;

            $data['recent_blogs']          = isset($this->recentArticles->blogs) ? $this->recentArticles->blogs : null;
            $data['featured_blogs']        = isset($this->featuredArticles->blogs) ? $this->featuredArticles->blogs : null;
            $data['popular_blogs']        = isset($this->popularArticles->blogs) ? $this->popularArticles->blogs : null;
            $data['categories']            = isset($this->categoryLists->categories) ? $this->categoryLists->categories : null;
            return view('frontend.pages.blog.index', $data);
        } else if(isset($data['articles_result']->status_code) && $data['articles_result']->status_code == 500){
            abort(500);
        } else {
            abort(404);
        }

    }

    public function indexWithPagination($page = 1)
    {
        $url                           = $this->getBlogArticleListDataApi();

        $params                        = [
                                            'page'          => $page,
                                            'platform'      => 'web',
                                            'limit'         => $this->limit
                                        ];

        $data['articles_result']       = $this->getQueryArticleListDataApi($url, $params);

        if ($data['articles_result'] != null && isset($data['articles_result']->blogs) && $data['articles_result']->blogs != null) {
            $data['articles']              = isset($data['articles_result']->blogs) ? $data['articles_result']->blogs : null;
            $data['paginator']             = isset($data['articles_result']->paginator) ? $data['articles_result']->paginator : null;

            $data['recent_blogs']          = isset($this->recentArticles) && isset($this->recentArticles->blogs) ? $this->recentArticles->blogs : null;
            $data['featured_blogs']        = isset($this->featuredArticles) && isset($this->featuredArticles->blogs) ? $this->featuredArticles->blogs : null;
            $data['popular_blogs']        = isset($this->popularArticles) && isset($this->popularArticles->blogs) ? $this->popularArticles->blogs : null;
            $data['categories']            = isset($this->categoryLists) && isset($this->categoryLists->categories) ? $this->categoryLists->categories : null;

            return view('frontend.pages.blog.index', $data);
        } else if(isset($data['articles_result']->status_code) && $data['articles_result']->status_code == 500) {
            abort(500);
        } else {
            abort(404);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param null $slug
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug = null)
    {

        $url                    = $this->getBlogArticleDataApi($id);
        if(\Cookie::has('_tn')) {

            $input['api_token']   = decrypt(\Cookie::get('_tn'));
            $result        = $this->getQueryArticleListDataApi($url, $input);
        } else {
            $result        = $this->getQueryArticleListDataApi($url);
        }
        // dd($result);
        if ($result != null && isset($result->status_code) && $result->status_code == 200) {
            $data['article']        = $result->blog;
            $data['relatedBlogs']   = array_slice($result->related->articles, 0, 2);
            $data['articleCategories'] = $data['article']->category_details;
            if(isset($this->recentArticles->blogs) && count($this->recentArticles->blogs)) {
                $data['recent_blogs'] = $this->recentArticles->blogs;
            }
            if(isset($this->featuredArticles->blogs) && count($this->featuredArticles->blogs)) {
                $data['featured_blogs'] = $this->featuredArticles->blogs;
            }

            if($this->popularArticles && isset($this->popularArticles->blogs) && count($this->popularArticles->blogs)) {
                $data['popular_blogs']        = isset($this->popularArticles->blogs) ? $this->popularArticles->blogs : null;
            }

            if(isset($this->categoryLists->categories) && count($this->categoryLists->categories)) {
                $data['categories'] = $this->categoryLists->categories;
            }
        return view('frontend.pages.blog.show', $data);
        } else if(isset($result->status_code) && $result->status_code == 500) {
            abort(500);
        } else {
            abort(404);
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request, $page = null)
    {
        $search                 = trim($request->search);
        $data['search']         = $search;
        $url                    = $this->getBlogArticleListDataApi();
        $params                 = [
            'q'             => $search,
            'page'          => $request->page,
            'platform'      => 'web',
            'limit'         => $this->limit
        ];

        $result                 = $this->getQueryArticleListDataApi($url, $params);

        if($result != null && isset($result->blogs)) {
            $data['articles']       = isset($result->blogs) ? $result->blogs : null;
            $data['paginator']      = isset($result->paginator) ? $result->paginator : null;
            $data['query_string']   = "search=$search&page=".$page;

            if(count($data['articles'])) {
              $data['recent_blogs']   = isset($this->recentArticles->blogs) ? $this->recentArticles->blogs : null;
            }

            if(isset($this->popularArticles->blogs) && count($this->popularArticles->blogs)) {
                $data['popular_blogs']        = isset($this->popularArticles->blogs) ? $this->popularArticles->blogs : null;
            }

            $data['featured_blogs'] = isset($this->featuredArticles->blogs) ? $this->featuredArticles->blogs : null;
            $data['categories']     = isset($this->categoryLists->categories) ? $this->categoryLists->categories : null;
        } else if(isset($result->status_code) && $result->status_code == 500){
            abort(500);
        } else {
            abort(404);
        }

        return view('frontend.pages.blog.index', $data);

    }


}
