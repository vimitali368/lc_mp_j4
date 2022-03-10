<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Article $article)
    {
        $date = Carbon::parse($article->created_at);
        return view('article.show', compact('article', 'date'));
    }

}
