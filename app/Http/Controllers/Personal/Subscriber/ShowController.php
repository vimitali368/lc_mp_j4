<?php

namespace App\Http\Controllers\Personal\Subscriber;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $reader)
    {
        return view('personal.subscriber.show', compact('reader'));
    }

}
