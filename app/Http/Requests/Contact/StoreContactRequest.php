<?php

namespace App\Http\Requests\Contact;

use App\Rules\Captcha;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string', 'min:10', 'max:1000'],
            'captcha_token' => ['required', new Captcha()],
        ];
    }
}
