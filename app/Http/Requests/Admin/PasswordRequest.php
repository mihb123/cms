<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'password.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.password')),
            'password.min' => sprintf(__($this->module . '::messages.validate.min'), __($this->module . '::messages.password'), 6),
            'password_confirmation.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.password_confirm')),
            'password_confirmation.same' => sprintf(__($this->module . '::messages.validate.same'), __($this->module . '::messages.password')),
        ];
    }

}
