<?php

namespace App\Http\Requests\color;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditColorRequest extends FormRequest
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
            'name'=> ['required','unique:colors,name,'.$this->color]
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên danh mục không được để trống!',
            'name.unique'=>"Danh mục $this->name đã tồn tại!"
        ];
    }
}
