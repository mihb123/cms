<?php

namespace App\Http\Requests\ProductGroup;

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
            'title' => 'required|max:255|unique:App\Models\ProductGroup,title',
            'status' => 'required|numeric',
            'category_id' => 'required|exists:App\Models\Category,id'
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.title')),
            'title.max' => sprintf(__('product::messages.validate.max'), __('product::messages.title'),255),
            'title.unique' => sprintf(__('product::messages.validate.unique'), __('product::messages.title')),
            'status.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.status')),
            'status.numeric' => sprintf(__('product::messages.validate.numeric'), __('product::messages.status')),
            'category_id.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.category')),
            'category_id.exists' => sprintf(__('product::messages.validate.exists'), __('product::messages.category')),
        ];
    }

}
