<?php

namespace App\Http\Requests\KeyWordsGroup;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
            'title_japan' => ['required','max:255',Rule::unique('group', 'title_japan')->whereNot('id', $this->id)->where('type', 'posts')],
            'status' => 'required|numeric',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title_japan.required' => sprintf(__('key-words::messages.validate.not_empty'), __('key-words::messages.title_japan')),
            'title_japan.max' => sprintf(__('key-words::messages.validate.max'), __('key-words::messages.title_japan'),255),
            'title_japan.unique' => sprintf(__('key-words::messages.validate.unique'), __('key-words::messages.title_japan')),
            'status.required' => sprintf(__('key-words::messages.validate.not_empty'), __('key-words::messages.status')),
            'status.numeric' => sprintf(__('key-words::messages.validate.numeric'), __('key-words::messages.status')),
        ];
    }

}
