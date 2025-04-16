<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Cms\Category\Models\Category;

class UpdateRequest extends FormRequest
{
    protected $module = 'tag';

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $arrValidations = [
            'title' => 'required|max:255|unique:App\Models\Tag,title,'. $this->id,
            'title_english' => 'required|max:255|unique:App\Models\Tag,title_english,'. $this->id,
            'status' => 'required|numeric',
            'group_id' => 'nullable|numeric|exists:App\Models\Group,id',
            'avatar' => 'required',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.title')),
            'title.max' => sprintf(__('tag::messages.validate.max'), __('tag::messages.title'),255),
            'title_english.required' => sprintf(__('posts::messages.validate.not_empty'), __('posts::messages.title_english')),
            'title_english.max' => sprintf(__('posts::messages.validate.max'), __('posts::messages.title_english'),255),
            'title.unique' => sprintf(__('tag::messages.validate.unique'), __('tag::messages.title')),
            'status.required' => sprintf(__('tag::messages.validate.not_empty'), __('tag::messages.status')),
            'status.numeric' => sprintf(__('tag::messages.validate.numeric'), __('tag::messages.status')),
            'group_id.numeric' => sprintf(__('tag::messages.validate.numeric'), __('tag::messages.group')),
            'group_id.exists' => sprintf(__('tag::messages.validate.exists'), __('tag::messages.group')),
            'avatar.required' => sprintf(__('tag::messages.validate.required'), __('tag::messages.avatar')),
        ];
    }
}
