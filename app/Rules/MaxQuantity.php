<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Stock;
class MaxQuantity implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $quantity;
    protected $id;
    public function __construct($quantity,$id)
    {
        $this->quantity=$quantity;
        $this->id=$id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $amount=Stock::where("product_id",$this->id)->pluck("quantity")->first();
        if($this->quantity>$amount){
            return false;
        }
        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "You can't buy as much products.";
    }
}
