<?php

namespace App\Http\Requests\TagCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $arrValidations = [
            'title' => ['required','max:255',Rule::unique('category', 'title')->whereNot('id', $this->id)->where('type', 'tag')],
            'status' => 'required|numeric',
            'group_id' => 'nullable|exists:App\Models\Group,id',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.title')),
            'title.max' => sprintf(__('tag::messages.validate.max'), __('tag::messages.title'),255),
            'title.unique' => sprintf(__('tag::messages.validate.unique'), __('tag::messages.title')),
            'status.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.status')),
            'status.numeric' => sprintf(__('tag::messages.validate.numeric'), __('tag::messages.status')),
            'group_id.exists' => sprintf(__('tag::messages.validate.exists'), __('tag::messages.group')),
        ];
    }

}
