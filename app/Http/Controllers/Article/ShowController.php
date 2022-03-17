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

        $relatedPosts = Article::whereHas('tags',
            function ($q) use ($article) {
                $q->whereIn('tags.id', $article->tags->pluck('id'));
            })
            ->where('id', '!=', $article->id)
            ->get()
            ->take(3);
//        dd($relatedPosts);

        event('articleHasViewed', $article);

        return view('article.show', compact('article', 'date', 'relatedPosts'));
    }

}
