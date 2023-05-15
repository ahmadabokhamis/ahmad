<?php

namespace App\Rules;

use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;

class UserOwnsProduct implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $product;
    public function __construct($product)
    {
        $this->product = $product;
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
        if (auth()->user()->company_id != null) {
            return $this->product && $this->product->table_id == auth()->user()->company_id;
        }else{
            return $this->product && $this->product->table_id == auth()->user()->id;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You do not have permission to enter';
    }
}
