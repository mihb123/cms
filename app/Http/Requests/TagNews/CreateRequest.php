<?php

namespace App\Http\Requests\TagNews;

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
            'tag_id' => 'required|numeric|exists:App\Models\Tag,id|unique:App\Models\TagNews,tag_id',
            'creator_id' => 'required|numeric|exists:App\Models\Creator,id',
            'status' => 'required|numeric',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'tag_id.exists' => sprintf(__('tag::messages.validate.exists'), __('tag::messages.tag')),
            'tag_id.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.tag')),
            'tag_id.numeric' => sprintf(__('tag::messages.validate.numeric'), __('tag::messages.tag')),
            'tag_id.unique' => sprintf(__('tag::messages.validate.unique'), __('tag::messages.tag')),
            'creator_id.exists' => sprintf(__('tag::messages.validate.exists'), __('tag::messages.creator')),
            'creator_id.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.creator')),
            'creator_id.numeric' => sprintf(__('tag::messages.validate.numeric'), __('tag::messages.creator')),
            'status.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.status')),
            'status.numeric' => sprintf(__('tag::messages.validate.numeric'), __('tag::messages.status')),
        ];
    }
}
