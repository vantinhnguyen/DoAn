<?php

namespace App\Http\Requests\login;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=> ['required'],
            'email'=> ['required','email', 'unique:users,email'],
            'phone'=> ['required','numeric','digits:10', 'unique:users,phone'],
            'password'=> ['required','min:8','max:100'],
            're_password'=> ['required','same:password'],
            'agree-term'=> ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên tài khoản không được để trống!',

            'email.required'=>'Email không được để trống!',
            'email.unique'=>"Email đã tồn tại!",
            'email.email'=>"$this->email không phải là email!",

            'phone.required'=>'Số điện thoại không được để trống!',
            'phone.unique'=>"Số điện thoại $this->phone đã tồn tại!",
            'phone.numeric'=>"Hãy điền ký tự là số!",
            // 'phone.min'=>"Số điện thoại phải có 10 ký tự số!",
            'phone.digits'=>"Số điện thoại phải có 10 ký tự số!",
            
            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>"Mật khẩu phải có ít nhất 8 ký tự!",
            'password.max'=>"Mật khẩu phải có ít hơn 100 ký tự!",

            're_password.required'=>'Hãy nhập lại mật khẩu!',
            're_password.same'=>"Mật khẩu không giống nhau!",

            'agree-term.required'=>'Tích chọn vào đồng ý với các điều khoản sử dụng!',
        ];
    }
}
