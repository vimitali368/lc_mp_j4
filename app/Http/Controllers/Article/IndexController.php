<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class IndexController extends Controller
{
    public function __invoke()
    {
        $articles = Article::paginate(6);
//        $randomArticles = Article::get()->random(4);
        return view('article.index', compact('articles'));
    }

}