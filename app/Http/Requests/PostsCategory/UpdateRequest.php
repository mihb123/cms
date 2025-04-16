<?php

namespace App\Http\Requests\PostsCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $arrValidations = [
            'title' => ['required', 'max:255', Rule::unique('category', 'title')->whereNot('id', $this->id)->where('type', 'posts')],
            'status' => 'required|numeric',
            'group_id' => 'required|exists:App\Models\Group,id',
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
            'group_id.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.group')),
            'group_id.exists' => sprintf(__('posts::messages.validate.exists'), __('posts::messages.group'))
        ];
    }

}
