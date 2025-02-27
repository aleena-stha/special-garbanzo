<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow the request
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     => 'required',
            'add'      => 'required',
            'gender'   => 'required',
            'date'     => 'required|date',
            'email'    => 'required|email',
            'password' => 'required|min:6|max:20',
            'photo'    => 'nullable|image|max:2048'
        ];
    }

    /**
     * Custom error messages for validation.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Oops, name is empty',
            // Add other custom messages as needed
        ];
    }
}
