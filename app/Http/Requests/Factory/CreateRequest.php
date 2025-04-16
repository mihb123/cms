<?php

namespace App\Http\Requests\Factory;

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
            'title' => 'required|max:255|unique:App\Models\Factory,title',
            'description' => 'required|max:255',
            'status' => 'required|numeric',
            'avatar' => 'required',
            'width_image' => 'nullable|numeric',
            'height_image' => 'nullable|numeric',
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
            'avatar.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.status')),
            'description.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.description')),
            'description.max' => sprintf(__('product::messages.validate.max'), __('product::messages.description'),255),
            'width_image.numeric' => sprintf(__('幅更新データは数値でなければなりません。')),
            'height_image.numeric' => sprintf(__('高さ更新データは数値でなければなりません。')),
        ];
    }

}
