<?php

namespace App\Http\Controllers\Personal\Like;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $articles = auth()->user()->likedArticles;
        return view('personal.like.index', compact('articles'));
    }

}
