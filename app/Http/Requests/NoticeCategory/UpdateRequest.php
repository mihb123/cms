<?php

namespace App\Http\Requests\NoticeCategory;

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
            'title' => 'required|max:255|unique:App\Models\NoticeCategory,title,'. $this->id,
            'status' => 'required|numeric',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.title')),
            'title.max' => sprintf(__('tag::messages.validate.max'), __('tag::messages.title'),255),
            'title.unique' => sprintf(__('tag::messages.validate.unique'), __('tag::messages.title')),
            'status.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.status')),
            'status.numeric' => sprintf(__('tag::messages.validate.numeric'), __('tag::messages.status')),
        ];
    }
}
