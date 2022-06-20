<?php

namespace App\Http\Requests\product_detail;

use Illuminate\Foundation\Http\FormRequest;

class AddProductDetailRequest extends FormRequest
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
            'file'=> ['required','mimes:jpg,png,jpeg,bmp'],
            'price'=> ['required','numeric'],
            'sale_price'=> ['required','numeric','lt:price']
        ];
    }
    public function messages()
    {
        return [
            'file.required'=>'Ảnh sản phẩm không được để trống!',
            'file.mimes'=>'Ảnh sản phẩm phải có định dạng jpg, png, jpeg, bmp!',
            'price.required'=>'Giá sản phẩm không được để trống!',
            'price.numeric'=>'Giá sản phẩm phải là số!',
            'sale_price.required'=>'Giá khuyến mại không được để trống!',
            'sale_price.numeric'=>'Giá khuyến mại phải là số!',
            'sale_price.lt'=>"Giá khuyến mại phải nhỏ hơn $this->price!",
        ];
    }
}
