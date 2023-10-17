<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'min:5', 'max:255'],
            'content' => ['sometimes'],
            'user_id' => ['sometimes', 'exists:users,id'],
            'category_id' => ['sometimes', 'exists:categories,id'],
        ];
    }
}
