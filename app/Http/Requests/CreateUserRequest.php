<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'min:6'],
        ];
    }
}
