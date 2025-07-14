<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'bail|required|string|max:255',
            'body' => 'bail|required|string',
            'author' => 'bail|required|string|max:255|unique:post,author,' . $this->id,
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'body.required' => 'The body is required.',
            'author.required' => 'The author is required.',
        ];
    }
}
