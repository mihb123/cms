<?php

namespace App\Http\Requests\ProductNews;

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
            'title' => 'required|max:255|unique:App\Models\ProductNews,title,'. $this->id,
            'category_id' => 'required|exists:App\Models\Category,id',
            'avatar' => 'required',
            'url' => 'required',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.title')),
            'title.max' => sprintf(__('product::messages.validate.max'), __('product::messages.title'),255),
            'title.unique' => sprintf(__('product::messages.validate.unique'), __('product::messages.title')),
            'category_id.required' => sprintf(__('product::messages.validate.required'), __('product::messages.category_id')),
            'category_id.exists' => sprintf(__('product::messages.validate.exists'), __('product::messages.category_id')),
            'avatar.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.avatar')),
            'url.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.url')),
        ];
    }
}
