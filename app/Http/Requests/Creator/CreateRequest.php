<?php

namespace App\Http\Requests\Creator;

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
            'name' => 'required|max:255|unique:App\Models\Creator,name',
            'gender' => 'required|numeric',
            'status' => 'required|numeric',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'name.required' => sprintf(__('名前を空にすることはできません')),
            'name.max' => sprintf(__('tag::messages.validate.max'), __('tag::messages.name'),255),
            'name.unique' => sprintf(__('tag::messages.validate.unique'), __('tag::messages.name')),
            'gender.required' => sprintf(__('family-member::messages.validate.not_empty'), __('creator::messages.gender')),
            'gender.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('creator::messages.gender')),
            'status.required' => sprintf(__('ステータス を空にすることはできません')),
            'status.numeric' => sprintf(__('ステータス を空にすることはできません')),
        ];
    }

}
