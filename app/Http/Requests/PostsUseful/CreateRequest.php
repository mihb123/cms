<?php

namespace App\Http\Requests\PostsUseful;

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
            'title' => 'required|max:255|unique:App\Models\PostUseful,title',
            // 'summary' => 'required',
            'creator_id' => 'required|numeric|exists:App\Models\Creator,id',
            'status' => 'required',
            'avatar' => 'required',
            'category_id' => 'required|exists:App\Models\Category,id',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.title')),
            'title.max' => sprintf(__('posts::messages.validate.max'), __('posts::messages.title'),255),
            'title.unique' => sprintf(__('posts::messages.validate.unique'), __('posts::messages.title')),
            // 'summary.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.summary')),
            'status.required' => sprintf(__('ステータスを選択してください')),
            'creator_id.exists' => sprintf(__('posts::messages.validate.exists'), __('posts::messages.creator')),
            'creator_id.required' => sprintf(__('著者を選択してください')),
            'avatar.required' => sprintf(__('posts::messages.validate.required'), __('posts::messages.avatar')),
            'category_id.exists' => sprintf(__('calculate::messages.validate.exists'), __('calculate::messages.category')),
            'category_id.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.category')),
        ];
    }

}
