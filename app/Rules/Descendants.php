<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Category;

class Descendants implements Rule
{
    private $category;
    private $id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->category = Category::find($id);
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
        $descendants = $this->category->getDescendants($this->category);
//        dd($descendants);
//        dd(!in_array($value, $descendants));
        return !in_array($value, $descendants);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Category cannot be updated, this category has nested categories.';
    }
}
