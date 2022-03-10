<?php

namespace App\Http\Controllers\Article\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\Comment\StoreRequest;
use App\Models\Article;
use App\Models\Comment;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
//        dd($article);
//        $data['user_id'] = auth()->user()->id;
//        $data['article_id']= $article->id;
        $data = $request->validated();
//        dd($data);
        Comment::firstOrCreate($data);
        return redirect()->route('article.show', $data['article_id']);
    }

}
