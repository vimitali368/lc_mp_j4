<?php

namespace App\Http\Controllers\Personal\Subscription\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class IndexController extends Controller
{
    public function __invoke()
    {
        $authors = auth()->user()->subscribedAuthors;
        $authorIds = $authors->pluck('id')->toArray();
//        dd($authorIds);
        $articles = Article::whereIn('user_id', $authorIds)->get();
//        dd($articles);
        return view('personal.subscription.article.index', compact('articles'));
    }

}
