<?php

namespace App\Http\Requests\login;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
        return [
            'email'=> ['required','email'],
            'password'=> ['required','min:8','max:100'],
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email không được để trống!',
            'email.email'=>"$this->email không phải là email!",

            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>"Mật khẩu phải có ít nhất 8 ký tự!",
            'password.max'=>"Mật khẩu phải có ít hơn 100 ký tự!"

        ];
    }
}
