<?php

namespace App\Http\Requests\ServiceGroup;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
            'title_japan' => ['required','max:255',Rule::unique('group', 'title_japan')->where('type', 'calculate-service')],
            'status' => 'required|numeric',
            'category_id' => 'required|exists:App\Models\Category,id',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title_japan.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.title_japan')),
            'title_japan.max' => sprintf(__('calculate::messages.validate.max'), __('calculate::messages.title_japan'),255),
            'title_japan.unique' => sprintf(__('calculate::messages.validate.unique'), __('calculate::messages.title_japan')),
            'status.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.status')),
            'status.numeric' => sprintf(__('calculate::messages.validate.numeric'), __('calculate::messages.status')),
            'category_id.exists' => sprintf(__('calculate::messages.validate.exists'), __('calculate::messages.level_of_care_required')),
            'category_id.required' => sprintf(__('calculate::messages.validate.required'), __('calculate::messages.level_of_care_required')),
        ];
    }

}
