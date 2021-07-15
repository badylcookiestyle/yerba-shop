<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Validator;
class StoreProductRequest extends FormRequest
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
            'productName'=>'required|min:3|max:64',
            'productBrand'=>['required','min:3','max:64',
            Rule::unique('products','brand')->where(function ($query) {
                $query->where('name', $this->productName)
                   ->where('brand', $this->productBrand);
            })],
            'productOrigin'=>'required|min:3|max:64|',
            'productQuantity'=>'required|min:0|numeric',
            'productDescription'=>'required|min:32|max:500',
            'productCategory'=>'required|exists:categories,name',
            'productPrice'=>'required|min:0|numeric',
            'file'=>'required|mimes:jpg,png|dimensions:ratio=1/1',

        ];
    }
}
