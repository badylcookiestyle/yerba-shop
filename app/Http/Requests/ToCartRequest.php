<?php

namespace App\Http\Requests;

use App\Rules\MaxQuantity;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\MaxQuantity\Validation\Rule;
use Validator;
class ToCartRequest extends FormRequest
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
            'id'=>'required|Exists:products',
            'quantity'=>['required','min:0',new MaxQuantity($this->quantity,$this->id)]
        ];
    }
}
