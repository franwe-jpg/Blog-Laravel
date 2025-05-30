<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'dni' => 'required|unique:users,dni,' . $this->user->id, // unique except for the current user
            'email' => 'required|email|unique:users,email,' . $this->user->id, // unique except for the current user
            'password' => 'nullable|min:8', // password is optional, but if provided, must be at least 8 characters
        ];
    }
}
