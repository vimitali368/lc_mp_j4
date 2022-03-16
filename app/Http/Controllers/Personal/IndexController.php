<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
//        $data['commentsCount'] = 3;
        $data['commentsCount'] = Comment::where('user_id', auth()->user()->id)->get()->count();
//        $data['commentsCount'] = auth()->user()->withCount['commentsCount'];
//        dd($data['commentsCount']);

        $data['personalArticlesCount'] = Article::where('user_id', auth()->user()->id)->where('is_personal', 1)->get()->count();
//        dd($a);

//        $data['articlesCount'] = Article::where('user_id', auth()->user()->id)->where('is_personal', 1)->get()->count();
//        $data['articlesCount'] = auth()->user()->withCount['articlesCount']->get();
//        dd($data['articlesCount']);
        return view('personal.main.index', compact('data'));
    }

}
