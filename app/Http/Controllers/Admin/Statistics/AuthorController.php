<?php

namespace App\Http\Controllers\Admin\Statistics;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
//use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['usersCount'] = User::role(['author-user'])->get()->count();
//        $data['usersCount'] = User::all()->count();
        $data['articlesCount'] = Article::all()->count();
//        $data['categoriesCount'] = Category::all()->count();
//        $data['tagsCount'] = Tag::all()->count();
        $data['users'] = User::role(['author-user'])->paginate(6);
        return view('admin.statistics.author', compact('data'));
    }

}
