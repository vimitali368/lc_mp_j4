<?php

namespace App\Http\Controllers\Personal\Like;


use App\Models\Article;

class DeleteController extends BaseController
{
    public function __invoke(Article $article)
    {
        auth()->user()->likedArticles()->detach($article->id);
        return redirect()->route('personal.like.index');
    }

}
