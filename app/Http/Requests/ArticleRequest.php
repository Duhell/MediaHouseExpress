<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
           'article_title'=>'required',
           'article_content'=>'required|required_if:article_title,1',
           'article_img'=>'sometimes|image'
        ];
    }


    public function messages()
    {
        return [
            'article_img'=>'Only image can be uploaded.'
        ];
    }
}
