<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:8'],
            'surface' => ['required','integer', 'min:10'],
            'rooms' => ['required','integer', 'min:1'],
            'bedrooms' => ['required', 'integer', 'min:0'],
            'floor' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'integer', 'min:0'],
            'city' => ['required', 'min:8'],
            'address' => ['required', 'min:8'],
            'postal_code' => ['required', 'min:3'],
            'sold' => ['required', 'boolean'],
            'options' => 'required|array',
            'options.*' => 'integer|exists:options,id',
        ];
    }
}
