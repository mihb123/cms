<?php
namespace App\Http\Requests\ProductOption;

use Illuminate\Foundation\Http\FormRequest;
class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $arrValidations = [          
            'category_id' => 'required|exists:App\Models\Category,id',
            'product_id' => 'required|exists:App\Models\Product,id',
            'company_id' => 'required|exists:App\Models\Company,id',
            'content' => 'required',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'category_id.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.category')),
            'category_id.exists' => sprintf(__('product::messages.validate.exists'), __('product::messages.category')),
            'product_id.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.product')),
            'product_id.exists' => sprintf(__('product::messages.validate.exists'), __('product::messages.product')),
            'company_id.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.company')),
            'company_id.exists' => sprintf(__('product::messages.validate.exists'), __('product::messages.company')),
            'content.required' => sprintf(__('product::messages.validate.not_empty'), __('product::messages.content')),
        ];
    }

}
