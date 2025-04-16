<?php

namespace App\Http\Requests\Partner;

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
            'url' => 'required|max:255|unique:App\Models\Partner,url',
            'status' => 'required|numeric',
            'avatar' => 'required',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'url.required' => sprintf(__('URLを空にすることはできません。')),
            'url.max' => sprintf(__('partner::messages.validate.max'), __('partner::messages.url'),255),
            'status.required' => sprintf(__('ステータスを空にすることはできません。')),
            'status.numeric' => sprintf(__('ステータスを空にすることはできません。')),
            'avatar.required' => sprintf(__('partner::messages.validate.required'), __('partner::messages.avatar')),
        ];
    }

}
