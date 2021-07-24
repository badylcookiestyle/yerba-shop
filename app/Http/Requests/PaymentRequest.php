<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'status'=>'required|min:3|max:64',
            'delivery_option'=>'required|min:3|max:64',
            'state'=>'required|min:3|max:64',
            'city'=>'required|min:3|max:64',
            'zip'=>'required|min:3|max:64',
            'street'=>'required|min:3|max:64',
            'house'=>'required|min:3|max:64',
        ];
    }
}
