<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'name' => ['required','string','min:3','max:255','regex:/^[A-Za-z\s\-]+$/'],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
                'min:3',
                'max:255'
            ],
            'role'=>['required','string','in:user,admin'],
            'password' => ['required', 'min:6', 'string','confirmed','max:255'],
                    
      ];
    }
}
