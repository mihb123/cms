<?php

namespace App\Http\Requests\Posts;

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
            'title' => 'required|max:255|unique:App\Models\Post,title,'. $this->id,
            'title_english' => 'required|max:255|unique:App\Models\Post,title_english,'. $this->id,
            'creator_id' => 'required|numeric|exists:App\Models\Creator,id',
            'group_id' => 'required|exists:App\Models\Group,id',
            'status' => 'required|numeric',
            'avatar' => 'required',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.title')),
            'title.max' => sprintf(__('posts::messages.validate.max'), __('posts::messages.title'),255),
            'title_english.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.title_english')),
            'title_english.max' => sprintf(__('posts::messages.validate.max'), __('posts::messages.title_english'),255),
            'title.unique' => sprintf(__('posts::messages.validate.unique'), __('posts::messages.title')),
            'status.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.status')),
            'status.numeric' => sprintf(__('posts::messages.validate.numeric'), __('posts::messages.status')),
            'creator_id.exists' => sprintf(__('posts::messages.validate.exists'), __('posts::messages.creator')),
            'creator_id.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.creator')),
            'group_id.exists' => sprintf(__('posts::messages.validate.exists'), __('posts::messages.group')),
            'group_id.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.group')),
            'avatar.required' => sprintf(__('posts::messages.validate.required'), __('posts::messages.avatar')),
        ];
    }

}
