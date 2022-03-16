<?php

namespace App\Http\Controllers\Article\Reader\Author;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke($author_id)
    {
//        dd($author_id);
        $articles = Article::where('is_personal', 1)->where('user_id', $author_id)->paginate(6);
//        $randomArticles = Article::get()->random(4);
//        $likedArticles = Article::where('is_personal', 1)->withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(5);
        return view('article.reader.author.show', compact('articles'));
//        return view('article.index', compact('articles', 'likedArticles'));
    }

}
