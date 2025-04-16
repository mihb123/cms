<?php

namespace App\Http\Requests\FamilyMemberTag;

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
            'title' => 'required|max:255|unique:App\Models\FamilyMemberTag,title',
            'tag_group_family_member_id' => 'required|numeric|exists:App\Models\FamilyMemberTagGroup,id',
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
            'tag_group_family_member_id.required' => sprintf(__('親タグは必須項目です。必ず選択ください。')),
            'tag_group_family_member_id.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('family-member::messages.group')),
            'tag_group_family_member_id.exists' => sprintf(__('family-member::messages.validate.exists'), __('family-member::messages.group')),
        ];
    }

}
