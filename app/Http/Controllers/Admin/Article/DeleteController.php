<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class DeleteController extends Controller
{
    public function __invoke(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.article.index');
    }
}
