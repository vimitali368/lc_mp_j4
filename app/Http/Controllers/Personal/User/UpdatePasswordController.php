<?php

namespace App\Http\Controllers\Personal\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\User\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class UpdatePasswordController extends Controller
{
    public function __invoke(UpdatePasswordRequest $request, User $user)
    {
        $data = $request->validated();
//        dd($data);
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return redirect()->route('personal.user.show', compact('user'))->with('status', 'Пароль успешно изменён!');
    }

}
