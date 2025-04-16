<?php

namespace App\Http\Requests\FamilyMemberTagGroup;

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
            'title' => 'required|max:255|unique:App\Models\FamilyMemberTagGroup,title',
            'status' => 'required|numeric',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('family-member::messages.validate.not_empty'), __('family-member::messages.title')),
            'title.max' => sprintf(__('family-member::messages.validate.max'), __('family-member::messages.title_'),255),
            'title.unique' => sprintf(__('family-member::messages.validate.unique'), __('family-member::messages.title')),
            'status.required' => sprintf(__('family-member::messages.validate.not_empty'), __('family-member::messages.status')),
            'status.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('family-member::messages.status')),
        ];
    }

}
