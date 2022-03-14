<?php

namespace App\Http\Requests\Personal\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Это поле необходимо для заполнения',
            'password.string' => 'Данные должны соответствовать строчному типу',
            'password.min' => 'Это поле должно быть не менее 8 символов',
            'password.confirmed' => 'Данные в полях должны совпадать',
        ];
    }
}
