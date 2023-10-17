<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'min:3', 'max:255'],
            'surname' => ['sometimes', 'string', 'min:3','max:255'],
            'email' => ['sometimes', 'email'],
            'password' => ['sometimes', 'min:6'],
        ];
    }
}
