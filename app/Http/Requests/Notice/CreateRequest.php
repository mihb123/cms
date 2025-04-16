<?php

namespace App\Http\Requests\Notice;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Cms\Category\Models\Category;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $arrValidations = [
            'title' => 'required|max:255|unique:App\Models\Notice,title',
            'status' => 'required|numeric',
            'content' => 'required',
            'notice_category_id' => 'nullable|numeric|exists:App\Models\NoticeCategory,id'
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.title')),
            'title.max' => sprintf(__('tag::messages.validate.max'), __('tag::messages.title'),255),
            'title.unique' => sprintf(__('tag::messages.validate.unique'), __('tag::messages.title')),
            'content.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.content')),
            'status.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.status')),
            'status.numeric' => sprintf(__('tag::messages.validate.numeric'), __('tag::messages.status')),
            'notice_category_id.numeric' => sprintf(__('tag::messages.validate.numeric'), __('tag::messages.notice_category')),
            'notice_category_id.exists' => sprintf(__('tag::messages.validate.exists'), __('カテゴリー')),
        ];
    }

}
