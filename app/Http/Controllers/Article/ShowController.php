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
//        dd($article->tags->pluck('title'));
        $relatedPosts = Article::where('id', '!=', $article->id)
            ->get()
            ->take(3);
//        dd($relatedPosts);
//        whereHas('tags', function ($q) use ($article) {
//            return $q->whereIn('title', $article->tags->pluck('title'));
//        })

        return view('article.show', compact('article', 'date', 'relatedPosts'));
    }

}
