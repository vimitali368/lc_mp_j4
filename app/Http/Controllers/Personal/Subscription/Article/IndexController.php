<?php

namespace App\Http\Controllers\Personal\Subscription\Article;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $authors = auth()->user()->subscribedAuthors;
//        $articles = auth()->user()->subscribedAuthors->articles();
//        dd($articles);
        return view('personal.subscription.index', compact('authors'));
    }

}
