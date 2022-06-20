<?php

namespace App\Http\Requests\size;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditSizeRequest extends FormRequest
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
            'name'=> ['required','unique:sizes,name,'.$this->size]
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
