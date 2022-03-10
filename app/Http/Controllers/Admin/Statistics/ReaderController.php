<?php

namespace App\Http\Controllers\Admin\Statistics;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['usersCount'] = User::role(['reader-user'])->get()->count();
//        $data['usersCount'] = User::all()->count();
        $data['commentsCount'] = Comment::all()->count();
//        $data['categoriesCount'] = Category::all()->count();
//        $data['tagsCount'] = Tag::all()->count();
        $users = User::role(['reader-user'])->paginate(6);
        return view('admin.statistics.reader', compact('data', 'users'));
    }

}
