<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user->id), // ignorar al usuario actual
            ],
            'password' => 'nullable|string|min:6|confirmed',
            'number' => 'nullable|string|max:10',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // 2MB
            'bio' => 'nullable|string|max:255',
            'instagram' =>'nullable',
        ];
    }
}
