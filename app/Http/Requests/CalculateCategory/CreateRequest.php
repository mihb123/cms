<?php

namespace App\Http\Requests\CalculateCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class  CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $arrValidations = [
            'title' => ['required','max:255',Rule::unique('category', 'title')->where('type', 'calculate')],
            'status' => 'required|numeric',
            'group_id' => 'nullable|exists:App\Models\Group,id',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.title')),
            'title.max' => sprintf(__('calculate::messages.validate.max'), __('calculate::messages.title'),255),
            'title.unique' => sprintf(__('calculate::messages.validate.unique'), __('calculate::messages.title')),
            'status.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.status')),
            'status.numeric' => sprintf(__('calculate::messages.validate.numeric'), __('calculate::messages.status')),
            'group_id.exists' => sprintf(__('calculate::messages.validate.exists'), __('calculate::messages.group')),
        ];
    }

}
