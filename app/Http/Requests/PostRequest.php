<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Str;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titre' => 'required',
            'slug' => ['regex:/^[0-9a-z\-]+$/', Rule::unique('posts')->ignore($this->route()->parameter('posts'))],
            'contenu' => 'required',
            'categories_id' => 'nullable|integer|exists'
        ];
    }

    public function messages()
    {
        return [
            'titre.required' => 'Le champs est requis',
            'contenu.required' => 'Le champs est requis',
            'slug.unique' => 'Ce slug existe déjà dans la base de données!'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('titre'))
        ]);
    }
}
