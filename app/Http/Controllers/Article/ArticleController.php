<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 11/14/14
 * Time: 2:57 PM
 * To change this template use File | Settings | File Templates.
 */
class ArticleController extends Controller
{

    public function getArticle($title_url)
    {

        $article = Article::where('title_url', $title_url)->first();

        if (is_null($article)) {
            return View::make("404");
        }
        return View::make('article')->with('article', $article);
    }

    public function index()
    {
        $articles = Article::paginate(15);
        return View::make('articles')->with('articles', $articles);
    }


}
