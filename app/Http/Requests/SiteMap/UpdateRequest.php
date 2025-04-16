<?php

namespace App\Http\Requests\SiteMap;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Cms\Category\Models\Category;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $arrValidations = [
            'title' => 'required|max:255|unique:App\Models\SiteMap,title,'. $this->id,
            'status' => 'required|numeric',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('sitemap::messages.validate.not_empty'), __('sitemap::messages.title')),
            'title.max' => sprintf(__('sitemap::messages.validate.max'), __('sitemap::messages.title'),255),
            'title.unique' => sprintf(__('sitemap::messages.validate.unique'), __('sitemap::messages.title')),
            'status.required' => sprintf(__('ステータスを空にすることはできません。')),
            'status.numeric' => sprintf(__('ステータスを空にすることはできません。')),
        ];
    }
}
