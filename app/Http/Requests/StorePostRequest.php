<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //permito que se validen las reglas de validacion de cualquier usuario 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'title' => 'required|min:5|max:255', //validamos que el titulo sea requerido y no supere los 255 caracteres
            'category' => 'required|max:50',
            'content' => 'required',    
        ];
    }

}
