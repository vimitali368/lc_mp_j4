<?php

namespace App\Http\Controllers\Personal\Subscriber;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $subscribers = auth()->user()->subscribers;
//        dd($readers);
//        $articles = auth()->user()->subscribedAuthors->articles();
//        dd($articles);
        return view('personal.subscriber.index', compact('subscribers'));
    }

}
