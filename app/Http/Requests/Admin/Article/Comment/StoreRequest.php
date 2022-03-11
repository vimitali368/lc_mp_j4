<?php

namespace App\Http\Requests\Admin\Article\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message' => 'required|string',
            'user_id' => 'required|numeric',
            'article_id' => 'required|numeric',
            'captcha' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'Это поле необходимо для заполнения',
            'message.string' => 'Данные должны соответствовать строчному типу',
            'user_id.required' => 'Это поле необходимо для заполнения',
            'user_id.numeric' => 'Данные должны соответствовать числовому типу',
            'article_id.required' => 'Это поле необходимо для заполнения',
            'article_id.numeric' => 'Данные должны соответствовать числовому типу',
            'captcha.required' => 'Это поле необходимо для заполнения',
            'captcha.captcha' => 'Введённые данные не соответствовуют данным на картинке',
        ];
    }
}
