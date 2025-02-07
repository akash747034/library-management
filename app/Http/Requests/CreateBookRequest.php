<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            'name'=>'required|min:3|max:255|regex:/^[A-Za-z\s\-]+$/',
            'auther_id'=>'required|exists:authers,id',
            'publisher_id'=>'required|exists:publishers,id',
            'category_id'=>'required|exists:categories,id',
            'quantity' =>'required|integer|min:1'
            
        ];
    }
}
