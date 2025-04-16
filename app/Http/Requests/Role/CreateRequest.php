<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        $arrValidations = [
            'roles' => 'required|unique:App\Role,roles',
            'name' => 'required',
            'description' => 'required',
            'status' => ['required', 'boolean'],
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'roles.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.roles')),
            'name.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.name')),
            'description.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.description')),
            'status.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.status')),
            'roles.exists' => sprintf(__($this->module . '::messages.validate.exists'), __($this->module . '::messages.roles')),
        ];
    }

}
