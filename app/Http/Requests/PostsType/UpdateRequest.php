<?php

namespace App\Http\Requests\PostsType;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Cms\Category\Models\Category;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $arrValidations = [
            'title' => 'required|max:255|unique:App\Models\PostType,title,'. $this->id,
            'status' => 'required|numeric',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.title')),
            'title.max' => sprintf(__('posts::messages.validate.max'), __('posts::messages.title_'),255),
            'title.unique' => sprintf(__('posts::messages.validate.unique'), __('posts::messages.title')),
            'status.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.status')),
            'status.numeric' => sprintf(__('posts::messages.validate.numeric'), __('posts::messages.status')),
        ];
    }

}
