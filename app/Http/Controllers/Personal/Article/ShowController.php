<?php

namespace App\Http\Controllers\Personal\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ShowController extends Controller
{
    public function __invoke(Article $article)
    {
        return view('personal.article.show', compact('article'));
    }
}
