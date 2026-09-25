<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array {
        return [
            'email.exists' => 'Email not found. Please check your email or register for an account.'
        ];
    }


    public function rules(): array
    {
        return [
            'email' => ['required', 'email','exists:users,email'],
            'password' => ['required']
        ];
    }
}
