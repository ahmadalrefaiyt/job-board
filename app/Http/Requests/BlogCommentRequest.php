<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCommentRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post_id' => 'bail|required|integer|exists:post,id',
            'comment' => 'bail|required|string|max:1000',
            'author' => 'bail|required|string|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'comment.required' => 'The comment is required.',
            'comment.string' => 'The comment must be a string.',
            'comment.max' => 'The comment may not be greater than 1000 characters.',
            'author.required' => 'The author name is required.',
            'author.string' => 'The author name must be a string.',
            'author.max' => 'The author name may not be greater than 255 characters.',
        ];
    }
}
