<?php

namespace App\Http\Requests\Banners;

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
            'status' => 'required|numeric',
            'avatar' => 'required',
            'position' => 'required',
            'width_image' => 'nullable|numeric',
            'height_image' => 'nullable|numeric',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'status.required' => sprintf(__('banners::messages.validate.not_empty'), __('banners::messages.status')),
            'status.numeric' => sprintf(__('banners::messages.validate.numeric'), __('banners::messages.status')),
            'avatar.required' => sprintf(__('tag::messages.validate.required'), __('tag::messages.avatar')),
            'position.required' => sprintf(__('banners::messages.validate.required'), __('banners::messages.position')),
            'width_image.numeric' => sprintf(__('幅更新データは数値でなければなりません。')),
            'height_image.numeric' => sprintf(__('高さ更新データは数値でなければなりません。')),
        ];
    }

}
