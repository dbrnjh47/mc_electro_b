<?php

namespace App\Rules\Auth;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueRole implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(User::where($attribute, $value)->whereNotNull('email_verified_at')->exists())
        {
            $fail(__("validation.unique"));
        }
    }
}
