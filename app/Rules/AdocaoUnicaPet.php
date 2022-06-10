<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Adocao;

class AdocaoUnicaPet implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        private int $petId
        )
    {}

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $jaAdotou = Adocao::where("e-mail", $value)
            ->where("pet_id", $this->petId)
            ->first();

        return !$jaAdotou;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Vocë já adotou esse Pet!';
    }
}
