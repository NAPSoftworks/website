<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class Captcha implements ValidationRule
{
    const MIN_SCORE = 0.5;

    /**
     * @param string $attribute
     * @param mixed $value
     * @param \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString $fail
     * @return void
     * @throws \Illuminate\Http\Client\ConnectionException
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.google.recaptcha.secret'),
            'response' => $value,
            'remoteip' => Request::ip(),
        ]);

        $result = $response->json();

        if (
            !Arr::get($result, 'success', false)
            || Arr::get($result, 'score', 0) < self::MIN_SCORE
        ) {
            $fail('ReCAPTCHA validation failed.');
        }
    }
}
