<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'search'=>'sometimes|max:80',
            'minPrice'=>'sometimes ',
            'maxPrice'=>'sometimes ',
            'category'=>'sometimes ',
            'brand'=>'sometimes ',
            'origin'=>'sometimes ',
            'orderType'=>'sometimes|in:Date added,Price,Alphabet',
            'searchingOrder'=>'sometimes|in:a,d',
            'filtered'=>'sometimes'
        ];
    }
}
