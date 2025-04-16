<?php

namespace App\Http\Requests\Admin;

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
            'mobile' => ['required','min:10','max:10','regex:' . config("constants.regex_phone_register")],
            'name' => 'required|max:255',
            'status' => 'required',
            'roles' => 'required',
            'email' => 'required|email|max:255|unique:App\Models\Admin,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            'mobile.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.phone')),
            'mobile.min' => sprintf(__($this->module . '::messages.validate.min_phone'), __($this->module . '::messages.phone'), 10),
            'mobile.max' => sprintf(__($this->module . '::messages.validate.max_phone'), __($this->module . '::messages.phone'), 10),
            'mobile.regex' => sprintf(__($this->module . '::messages.validate.regex'), __($this->module . '::messages.phone')),
            'name.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.title')),
            'name.max' => sprintf(__($this->module . '::messages.validate.max'), __($this->module . '::messages.title'),255),
            'roles.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.roles')),
            'email.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.email')),
            'email.email' => sprintf(__($this->module . '::messages.validate.email'), __($this->module . '::messages.email'),255),
            'email.max' => sprintf(__($this->module . '::messages.validate.max'), __($this->module . '::messages.email'), 255),
            'email.exists' => sprintf(__($this->module . '::messages.validate.exists'), __($this->module . '::messages.email'), 255),
            'password.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.password')),
            'password.min' => sprintf(__($this->module . '::messages.validate.min'), __($this->module . '::messages.password'), 6),
            'password_confirmation.required' => sprintf(__($this->module . '::messages.validate.not_empty'), __($this->module . '::messages.password_confirm')),
            'password_confirmation.same' => sprintf(__($this->module . '::messages.validate.same'), __($this->module . '::messages.password')),
        ];
    }

}
