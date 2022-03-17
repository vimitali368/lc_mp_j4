<?php

namespace App\Http\Controllers\Article\Like;

use App\Http\Controllers\Controller;
use App\Models\Article;

class StoreController extends Controller
{
    public function __invoke(Article $article)
    {
        auth()->user()->likedArticles()->toggle($article->id);
        return redirect()->back();
    }
}
