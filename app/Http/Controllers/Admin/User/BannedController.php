<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class BannedController extends Controller
{
    public function __invoke()
    {
        $users = User::permission('banned')->paginate(6);
        return view('admin.user.banned', compact('users'));
    }
}
