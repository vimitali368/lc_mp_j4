<?php

namespace App\Http\Controllers\Personal\Subscription;

use App\Http\Controllers\Controller;
use App\Models\User;

class DeleteController extends Controller
{
    public function __invoke(User $author)
    {
        auth()->user()->subscribedAuthors()->detach($author->id);

        return redirect()->route('personal.subscription.index');
    }

}
