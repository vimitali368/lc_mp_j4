<?php

namespace App\Http\Controllers\Personal\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\User\UpdatePasswordRequest;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(UpdatePasswordRequest $request, User $user)
    {
//        dd($request);
        $data = $request->validated();
//        dd($data);
        $user->update($data);
        return view('personal.user.show', compact('user'));
    }

}
