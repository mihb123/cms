<?php

namespace App\Http\Requests\TagGroup;

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
            'title_japan' => ['required','max:255',Rule::unique('group', 'title_japan')->where('type', 'tag')],
            'title_english' => 'required|max:255|unique:App\Models\Group,title_english',
            'status' => 'required|numeric',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title_japan.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.title_japan')),
            'title_japan.max' => sprintf(__('tag::messages.validate.max'), __('tag::messages.title_japan'),255),
            'title_japan.unique' => sprintf(__('tag::messages.validate.unique'), __('tag::messages.title_japan')),
            'title_english.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.title_english')),
            'title_english.max' => sprintf(__('tag::messages.validate.max'), __('tag::messages.title_english'),255),
            'title_english.unique' => sprintf(__('tag::messages.validate.unique'), __('tag::messages.title_english')),
            'status.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.status')),
            'status.numeric' => sprintf(__('tag::messages.validate.numeric'), __('tag::messages.status')),
        ];
    }

}
