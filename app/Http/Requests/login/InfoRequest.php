<?php

namespace App\Http\Requests\login;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class InfoRequest extends FormRequest
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
            'email'=> ['required','email', 'unique:users,email,'.Auth::user()->id],
            'phone'=> ['required','numeric','digits:10', 'unique:users,phone,'.Auth::user()->id],
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

        ];
    }
}
