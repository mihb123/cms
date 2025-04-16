<?php

namespace App\Http\Requests\ServiceCalculate;

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
            'title' => 'required|max:255|unique:App\Models\ServiceCalcute,title',
//            'money' => 'required|numeric',
            'group_id' => 'required|exists:App\Models\Group,id',
            'category_id' => 'required|exists:App\Models\Category,id',
            'title_description' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|numeric',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.title')),
            'title.max' => sprintf(__('calculate::messages.validate.max'), __('calculate::messages.title'),255),
            'title.unique' => sprintf(__('calculate::messages.validate.unique'), __('calculate::messages.title')),
//            'money.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.money')),
//            'money.numeric' => sprintf(__('calculate::messages.validate.numeric'), __('calculate::messages.money')),
            'group_id.exists' => sprintf(__('calculate::messages.validate.exists'), __('calculate::messages.group')),
            'group_id.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.group')),
            'category_id.exists' => __('要介護度は必須項目です。必ず指定してください。'),
            'category_id.required' => __('要介護度は必須項目です。必ず指定してください。'),
            'title_description.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.title_description')),
            'title_description.max' => sprintf(__('calculate::messages.validate.max'), __('calculate::messages.title_description'), 255),
            'description.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.description')),
            'status.required' => sprintf(__('calculate::messages.validate.not_empty'), __('calculate::messages.status')),
            'status.numeric' => sprintf(__('calculate::messages.validate.numeric'), __('calculate::messages.status')),
        ];
    }

}
