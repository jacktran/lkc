<?php

namespace  App\Http\Controllers\Page\Client;

use App\Http\Controllers\Controller as Controller;

use Models\Article\ArticleRepository as ArticleRepository;

use View;

class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    protected $articleRep;

    public function __construct(ArticleRepository $articleRep)
    {
        $this->articleRep = $articleRep;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $articles = $this->articleRep->paginate(array('title', 'title_url', 'posted_by', 'type'));
        return View::make('hello')->with("articles", $articles);
    }

}
