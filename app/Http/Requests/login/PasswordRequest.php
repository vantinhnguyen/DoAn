<?php

namespace App\Http\Requests\login;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password_old'=> ['required','min:8','max:100'],
            'password'=> ['required','min:8','max:100'],
            're_password'=> ['required','same:password'],
        ];
    }
    public function messages()
    {
        return [
            'password_old.required'=>'Mật khẩu không được để trống!',
            'password_old.min'=>"Mật khẩu phải có ít nhất 8 ký tự!",
            'password_old.max'=>"Mật khẩu phải có ít hơn 100 ký tự!",

            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>"Mật khẩu phải có ít nhất 8 ký tự!",
            'password.max'=>"Mật khẩu phải có ít hơn 100 ký tự!",

            're_password.required'=>'Hãy nhập lại mật khẩu!',
            're_password.same'=>"Mật khẩu không giống nhau!",
        ];
    }
}
