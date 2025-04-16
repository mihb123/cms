<?php

namespace App\Http\Requests\Product;

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
            'title' => 'required|max:255|unique:App\Models\Product,title,'. $this->id,
            'avatar' => 'required',
            'image_slider' => 'required',
            'description' => 'required',
            'factory_id' => 'required|exists:App\Models\Factory,id',
            'star' => 'required|numeric',
//            'note' => 'required',
            'category_id' => 'required|exists:App\Models\Category,id',
            'keyWord_id' => 'required|exists:App\Models\KeyWords,id'
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'title.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.title')),
            'title.max' => sprintf(__('product::messages.validate.max'), __('product::messages.title'),255),
            'title.unique' => sprintf(__('product::messages.validate.unique'), __('product::messages.title')),
            'avatar.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.avatar')),
            'image_slider.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.image_slider')),
            'description.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.description')),
            'factory_id.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.factory')),
            'factory_id.exists' => sprintf(__('product::messages.validate.exists'), __('product::messages.factory')),
//            'note.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.note')),
            'star.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.star')),
            'star.numeric' => sprintf(__('product::messages.validate.numeric'), __('product::messages.star')),
            'category_id.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.category')),
            'category_id.exists' => sprintf(__('product::messages.validate.exists'), __('product::messages.category')),
            'keyWord_id.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.key_words')),
            'keyWord_id.exists' => sprintf(__('product::messages.validate.exists'), __('product::messages.key_words')),
        ];
    }
}
