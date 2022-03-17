<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'preview_image' => 'nullable|file',
            'user_id' => 'nullable|numeric',
            'category_id' => 'nullable|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
            'is_personal' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'description.string' => 'Данные должны соответствовать строчному типу',
            'content.string' => 'Данные должны соответствовать строчному типу',
            'preview_image.file' => 'Необходимо выбрать файл',
            'user_id.numeric' => 'Данные должны соответствовать числовому типу',
            'category_id.integer' => 'ID категории должен быть числом',
            'category_id.exists' => 'ID категории должен быть в базе данных',
            'tag_ids.array' => 'Необходимо отправить массив данных',
            'is_personal.required' => 'Это поле необходимо для заполнения',
            'is_personal.boolean' => 'Данные должны соответствовать логическому типу',
        ];
    }
}
