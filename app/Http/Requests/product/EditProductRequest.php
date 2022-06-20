<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditProductRequest extends FormRequest
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
            'name'=> ['required','unique:products,name,'.$this->product],
            'description'=> ['nullable'],
            'file'=> ['nullable','mimes:jpg,png,jpeg,bmp'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên danh mục không được để trống!',
            'name.unique'=>"Danh mục $this->name đã tồn tại!",
            'file.mimes'=>'Ảnh sản phẩm phải có định dạng jpg, png, jpeg, bmp!'
        ];
    }
}
