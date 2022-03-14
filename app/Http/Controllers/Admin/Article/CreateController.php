<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class CreateController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        return view('admin.article.create', compact('tags'));
    }
}
