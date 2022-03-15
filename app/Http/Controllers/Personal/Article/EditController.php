<?php

namespace App\Http\Controllers\Personal\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('personal.article.edit', compact('article', 'tags', 'categories'));
    }
}
