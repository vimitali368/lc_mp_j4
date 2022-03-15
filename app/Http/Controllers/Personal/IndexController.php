<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
//        $data['commentsCount'] = auth()-user()->withCount['commentsCount'];
//        dd($data['commentsCount']);
//        $data['articlesCount'] = auth()-user()->withCount['articlesCount'];
        return view('personal.main.index', compact('data'));
    }

}
