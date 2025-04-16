<?php

namespace App\Http\Requests\FamilyMember;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    protected $module = 'family_member';

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $arrValidations = [
            'name' => 'required|max:255',
            'gender' => 'required|numeric',
            'birthday' => 'required|numeric',
            'avatar' => 'required',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'name.required' => sprintf(__('お名前は必須項目です。')),
            'name.max' => sprintf(__('family-member::messages.validate.max'), __('family-member::messages.name'),255),
            'gender.required' => sprintf(__('family-member::messages.validate.not_empty'), __('family-member::messages.gender')),
            'gender.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('family-member::messages.gender')),
            'birthday.required' => sprintf(__('生年月日は必須項目です。')),
            'birthday.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('family-member::messages.birthday')),
            'avatar.required' => sprintf(__('画像をアップロードしてください。')),
        ];
    }
}
