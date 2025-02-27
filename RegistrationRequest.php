<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            "name" => 'required',
            "add" => 'required',
            "gender" => 'required',
            "date" => 'required|date',
            "email" => 'required|email|',
            "password" => 'required|min:6|max:20',
            "photo" => 'nullable|image|max:2048' //image can be used as well but for common only
            // "photo" => 'nullable|mimes:jpg,png' //we can use this way and make multiple rules for image as well
        ];
    }

    public function messages(): array
    {
        return[
            //'name.rulename' => 'message'
            'name.required' => 'Oops name is empty' // this will show the messages
        ];
    }

    
}
