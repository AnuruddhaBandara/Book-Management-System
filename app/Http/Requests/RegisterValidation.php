<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required|string|regex:/^[a-zA-Z\s\'-]+$/',
            'email' => 'required|string|email|max:255|unique:staff',
            'password' => 'required|string|min:8|confirmed',


        ];
    }
    public function messages(): array
    {
        return [
            'name.regex' => 'Please provide a valid name.',
            'email' => 'Please provide a unique Email for staff.',
            'password' => 'Password must contain at least 8 characters.'
        ];
    }
}
