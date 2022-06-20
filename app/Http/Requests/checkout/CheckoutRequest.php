<?php

namespace App\Http\Requests\checkout;

use Illuminate\Foundation\Http\FormRequest;


class CheckoutRequest extends FormRequest
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
            'address'=> ['required']
        ];
    }
    public function messages()
    {
        return [
            'address.required'=>'Địa chỉ giao hàng không được để trống!'
        ];
    }
}
