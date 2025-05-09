<?php

namespace App\Http\Requests\PostsTopicCategory;

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
            'title' => ['required','max:255', Rule::unique('category', 'title')->where('type', 'posts-topic')],
            'status' => 'required|numeric',
            // 'avatar' => 'required',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.title')),
            'title.max' => sprintf(__('posts::messages.validate.max'), __('posts::messages.title'),255),
            'title.unique' => sprintf(__('posts::messages.validate.unique'), __('posts::messages.title')),
            'status.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.status')),
            'status.numeric' => sprintf(__('posts::messages.validate.numeric'), __('posts::messages.status')),
            // 'avatar.required' => sprintf(__('posts::messages.validate.required'), __('posts::messages.avatar')),
        ];
    }

}
