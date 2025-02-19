<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class WebTranslationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'            => 'required|string|max:255',
            'slug'            => 'required|string|max:255|unique:web_translations,slug',
            'language_code'   => 'required|string|in:tr,en,de,fr',
            'shor_description'=> 'nullable|string|max:500',
            'description'     => 'nullable|string',
            'meta_title'      => 'nullable|string|max:255',
            'meta_keywords'   => 'nullable|string|max:500',
            'meta_description'=> 'nullable|string|max:500',
        ];
    }
}
