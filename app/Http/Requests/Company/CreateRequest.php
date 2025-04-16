<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $arrValidations = [
            'name' => 'required|max:255|unique:App\Models\Company,name',
//            'summary' => 'required|max:255',
            'zip' => 'required',
            'province' => 'required',
            'city' => 'required',
            'address' => 'required',
            'category_id' => 'required|exists:App\Models\Category,id',
            'service_id' => 'required|exists:App\Models\Service,id'
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'name.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.name')),
            'name.max' => sprintf(__('product::messages.validate.max'), __('product::messages.name'),255),
            'name.unique' => sprintf(__('product::messages.validate.unique'), __('product::messages.name')),
//            'summary.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.summary')),
//            'summary.max' => sprintf(__('product::messages.validate.max'), __('product::messages.summary'),255),
            'zip.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.zip')),
            'province.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.province')),
            'city.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.city')),
            'address.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.address')),
            'category_id.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.category')),
            'category_id.exists' => sprintf(__('product::messages.validate.exists'), __('product::messages.category')),
            'service_id.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.service')),
            'service_id.exists' => sprintf(__('product::messages.validate.exists'), __('product::messages.service')),
        ];
    }

}
