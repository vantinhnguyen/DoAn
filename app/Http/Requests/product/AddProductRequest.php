<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'=> ['required','unique:products'],
            'description'=> ['nullable'],
            'file'=> ['required','mimes:jpg,png,jpeg,bmp'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên danh mục không được để trống!',
            'name.unique'=>"Danh mục $this->name đã tồn tại!",
            'file.required'=>'Ảnh đại diện không được để trống!',
            'file.mimes'=>'Ảnh sản phẩm phải có định dạng jpg, png, jpeg, bmp!'
        ];
    }
}
