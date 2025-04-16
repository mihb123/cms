<?php

namespace App\Http\Requests\PercentageBurden;

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
            'title' => 'required|max:255|unique:App\Models\PercentageBurden,title',
            'status' => 'required|numeric',
            'percentage' => 'required|numeric|integer|regex:/^.{1,9}$/',
            'category_id' => 'required|exists:App\Models\Category,id',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.title')),
            'title.max' => sprintf(__('calculate::messages.validate.max'), __('calculate::messages.title'), 255),
            'title_english.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.title_english')),
            'status.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.status')),
            'status.numeric' => sprintf(__('calculate::messages.validate.numeric'), __('calculate::messages.status')),
            'percentage.required' => sprintf(__('calculate::messages.validate.required'), __('calculate::messages.percentage')),
            'percentage.integer' => sprintf(__('calculate::messages.validate.integer'), __('calculate::messages.percentage')),
            'percentage.numeric' => sprintf(__('calculate::messages.validate.numeric'), __('calculate::messages.percentage')),
            'percentage.regex' => sprintf(__('calculate::messages.validate.max'), __('calculate::messages.percentage'), __(9)),
            'category_id.exists' => sprintf(__('calculate::messages.validate.exists'), __('calculate::messages.category')),
            'category_id.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.category')),

        ];
    }
}
