<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['commentsCount'] = 2;
//        Comment::all()->count();
        $data['likesCount'] = 3;
//        Like::all()->count();
        return view('personal.main.index', compact('data'));
    }

}
