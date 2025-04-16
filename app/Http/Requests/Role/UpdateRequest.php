<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    protected $module = 'backend';

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $arrValidations = [];
        if (!$this->has('perms')) {
            $arrValidations = [
                'name' => 'required',
                'description' => 'required',
                'status' => ['required', 'boolean'],
            ];
        }
        return $arrValidations;
    }

    public function messages()
    {
        return [
            'name.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.name')),
            'description.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.description')),
            'status.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.status')),
        ];
    }

}
