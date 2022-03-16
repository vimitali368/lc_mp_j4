<?php

namespace App\Http\Controllers\Article\Reader;

use App\Http\Controllers\Controller;
use App\Models\Article;

class IndexController extends Controller
{
    public function __invoke()
    {
        $articles = Article::where('is_personal', 1)->paginate(6);
//        $randomArticles = Article::get()->random(4);
//        $likedArticles = Article::where('is_personal', 1)->withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(5);
        return view('article.reader.index', compact('articles'));
//        return view('article.index', compact('articles', 'likedArticles'));
    }

}
