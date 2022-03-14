<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Article $article)
    {
        $tags = Tag::all();
        return view('admin.article.edit', compact('article', 'tags'));
    }
}
