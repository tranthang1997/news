<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'sltParent' => 'required',
            'txtName' => 'required|unique:products,name',
            'fImages' => 'required|image|max:100000'
        ];
    }
    public function messages() {
        return [
            'sltParent.required' => 'Please choose Category!',
            'txtName.required' => 'Please enter Product name!',
            'txtName.unique' => 'Product Name is exits!',
            'fImages.required' => 'Please choose image!',
            'fImages.image' => 'This file is not image'
        ];
    }
}
