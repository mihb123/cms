<?php

namespace App\Http\Requests\PostsTopic;

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
            'title' => 'required|max:255|unique:App\Models\PostTopic,title',
             'summary' => 'required',
            'creator_id' => 'required|numeric|exists:App\Models\Creator,id',
            'category_id' => 'required|numeric|exists:App\Models\Category,id',
            'status' => 'required|numeric',
            'position' => 'required|numeric',
            'avatar' => 'required',
            'icon' => 'required',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.title')),
            'title.max' => sprintf(__('posts::messages.validate.max'), __('posts::messages.title'),255),
            'title.unique' => sprintf(__('posts::messages.validate.unique'), __('posts::messages.title')),
             'summary.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.summary')),
            // 'summary.max' => sprintf(__('posts::messages.validate.max'), __('posts::messages.summary'),255),
            'status.required' => sprintf(__('ステータスを選択してください')),
            'status.numeric' => sprintf(__('posts::messages.validate.numeric'), __('posts::messages.status')),
            'position.required' => sprintf(__('posts::messages.validate.required'), __('posts::messages.position')),
            'position.numeric' => sprintf(__('posts::messages.validate.numeric'), __('posts::messages.position')),
            'creator_id.exists' => sprintf(__('posts::messages.validate.exists'), __('posts::messages.creator')),
            'creator_id.required' => sprintf(__('著者を選択してください')),
            'category_id.exists' => sprintf(__('posts::messages.validate.exists'), __('posts::messages.category')),
            'category_id.numeric' => sprintf(__('posts::messages.validate.numeric'), __('posts::messages.category')),
            'category_id.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.category')),
            'avatar.required' => sprintf(__('posts::messages.validate.required'), __('posts::messages.avatar')),
            'icon.required' => sprintf(__('posts::messages.validate.required'), __('posts::messages.icon')),
        ];
    }

}
