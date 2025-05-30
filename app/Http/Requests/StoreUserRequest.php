<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'dni' => 'string|max:20|unique', // dni is optional, max length 20, unique in users table
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed', // confirmed means there should be a password_confirmation field
        ];
    }
}
