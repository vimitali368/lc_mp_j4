<?php

namespace App\Http\Controllers\Personal\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class IndexController extends Controller
{
    public function __invoke()
    {
        $articles = Article::withCount('likedUsers')->withCount('comments')->sortable()->paginate(6);
//        dd($articles);
        return view('personal.article.index', compact('articles'));
    }
}
