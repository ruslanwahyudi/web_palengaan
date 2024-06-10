<?php

namespace App\Http\Requests\article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
        $id = request()->segments()['2'];
        return [
            //
            'title' => 'required|min:2|max:255',
            'slug' => 'unique:articles,slug, ' .$id,
            'content' => 'required|min:2',
            'date' => 'required|date',
            'status' => 'required',
            'category_id' => 'required',
        ];
    }
}
