<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'productNameEdit'=>'required|min:3|max:64',
            'productBrandEdit'=>'required|min:3|max:64',
            'productOriginEdit'=>'required|min:3|max:64|',
            'productQuantityEdit'=>'required|min:0|numeric',
            'productDescriptionEdit'=>'required|min:32|max:500',
            'productCategoryEdit'=>'required|exists:categories,name',
            'productPriceEdit'=>'required|min:0|numeric',
            'productIdEdit'=>'required|min:0|numeric',
            'fileEdit'=>'sometimes|mimes:jpg,png|dimensions:ratio=1/1',
        ];
    }
}
