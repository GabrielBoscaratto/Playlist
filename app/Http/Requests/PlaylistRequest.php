<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaylistRequest extends FormRequest
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
            "title" => "required", 
            "author" => "required", 
            "description" => "required", 
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'O título não pode ficar em branco.',
            'author.required'  => 'O autor não pode ficar em branco',
            'description.required'  => 'A descrição não pode ficar em branco',
        ];
    }
}
