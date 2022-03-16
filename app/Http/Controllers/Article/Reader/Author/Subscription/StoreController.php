<?php

namespace App\Http\Controllers\Article\Reader\Author\Subscription;

use App\Http\Controllers\Controller;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(User $author)
    {
//        dd($author->id);
        auth()->user()->subscribedAuthors()->toggle($author->id);
        return redirect()->back();
    }
}
