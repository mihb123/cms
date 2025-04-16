<?php

namespace App\Http\Requests\DestinationGuide;

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
            'title' => 'required|max:255|unique:App\Models\DestinationGuide,title,' . $this->id,
            // 'description' => 'required',
            // 'avatar' => 'required',
            'url' => 'required',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('destination-guide::messages.validate.not_empty'), __('destination-guide::messages.title')),
            'title.max' => sprintf(__('destination-guide::messages.validate.max'), __('destination-guide::messages.title'), 255),
            'title.unique' => sprintf(__('destination-guide::messages.validate.unique'), __('destination-guide::messages.title')),
            // 'avatar.required' => sprintf(__('destination-guide::messages.validate.not_empty'), __('destination-guide::messages.status')),
            // 'description.required' => sprintf(__('destination-guide::messages.validate.not_empty'), __('destination-guide::messages.description')),
            'url.required' => sprintf(__('destination-guide::messages.validate.not_empty'), __('destination-guide::messages.url')),
        ];
    }
}
