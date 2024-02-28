<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConteudoRequest extends FormRequest
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
            "playlist_id" => "required", 
            "url" => "required", 
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'o título não pode ficar em branco.',
            'playlist_id.required'  => 'A playlist não pode ficar em branco',
            'url.required'  => 'A url não pode ficar em branco',
        ];
    }
}
