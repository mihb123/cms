<?php

namespace App\Http\Requests\KeyWords;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $arrValidations = [
            'title_admin' => 'required|max:255|unique:App\Models\KeyWords,title_admin',
            'title_user' => 'required|max:255|unique:App\Models\KeyWords,title_user',
            'status' => 'required',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title_admin.required' => sprintf(__('key-words::messages.validate.not_empty'), __('key-words::messages.title')),
            'title_admin.max' => sprintf(__('key-words::messages.validate.max'), __('key-words::messages.title'), 255),
            'title_admin.unique' => sprintf(__('key-words::messages.validate.unique'), __('key-words::messages.title')),
            'title_user.required' => sprintf(__('key-words::messages.validate.not_empty'), __('key-words::messages.title_user')),
            'title_user.max' => sprintf(__('key-words::messages.validate.max'), __('key-words::messages.title_user'), 255),
            'title_user.unique' => sprintf(__('key-words::messages.validate.unique'), __('key-words::messages.title_user')),
            'status.required' => sprintf(__('key-words::messages.validate.not_empty'), __('key-words::messages.status')),
        ];
    }
}
