<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class BanController extends Controller
{
    public function __invoke(User $user)
    {
        if ($user->hasPermissionTo('add comments')) {
            $user->revokePermissionTo(['add comments']);
            $user->givePermissionTo(['banned']);
        } else {
            if ($user->hasPermissionTo('banned')) {
                $user->revokePermissionTo(['banned']);
                $user->givePermissionTo(['add comments']);
            }
        }
        return redirect()->back();
    }

}
