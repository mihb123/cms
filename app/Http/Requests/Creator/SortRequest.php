<?php

namespace App\Http\Requests\Creator;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Cms\Category\Models\Category;

class SortRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $arrValidations = [
            'sort' => 'date_format:Y-m-d H:i:s',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
        ];
    }

}
