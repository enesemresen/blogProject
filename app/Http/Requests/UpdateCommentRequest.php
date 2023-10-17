<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'content' => ['sometimes'],
            'user_id' => ['sometimes', 'exists:users,id'],
            'post_id' => ['sometimes', 'exists:posts,id'],
        ];
    }
}
