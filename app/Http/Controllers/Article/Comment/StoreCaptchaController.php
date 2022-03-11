<?php

namespace App\Http\Controllers\Article\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreCaptchaController extends Controller
{
    public function captchaFormValidate(Request $request) {
        $request->validate([
            'message' => 'required|string',
            'captcha' => 'required|captcha',
        ]);
    }
    public function reloadCaptcha() {
        return response()->json(['captcha' => captcha_img()]);
    }
}
