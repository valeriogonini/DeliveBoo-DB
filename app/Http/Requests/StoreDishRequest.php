<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDishRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'image' => 'nullable',
            'price' => 'required|numeric|between:0.01,9999.99',
            'description' => 'nullable',
            'availability' => 'required'




        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.numeric' => 'Inserire un numero.',
            'price.min' => 'Il prezzo deve essere maggiore di 0.',
            'price.max' => 'Il prezzo è troppo alto',

            //nome
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve contenere almeno 3 caratteri',

        ];
    }
}
