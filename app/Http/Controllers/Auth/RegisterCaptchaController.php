<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function captcha_img;
use function response;

class RegisterCaptchaController extends Controller {

    public function captchaFormValidate(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'captcha' => 'required|captcha',
        ]);
    }

    public function reloadCaptcha() {
        return response()->json(['captcha' => captcha_img()]);
    }
}
