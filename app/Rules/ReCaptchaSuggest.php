<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class ReCaptchaSuggest implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $action)
    {
        $this->action = $action;
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
        $response = Http::get("https://www.google.com/recaptcha/api/siteverify",[
            'secret' => env('RECAPTCHA_SECRET'),
            'response' => $value
        ])->object();




        if ($response->success && ($response->action === $this->action)) {
            if ($response->score < config('services.recaptcha.threshold')) {
                return false;
            }

            return true;
        }


        return $response->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The google recaptcha is required.';
    }
}
