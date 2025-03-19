<?php

namespace App\Http\Requests\Traits;

trait WebTranslationRules
{
    public function translationRules(): array
    {
        return [
            'tr_name'             => 'required|string|max:255',
            'tr_slug'             => 'required|string|max:255|unique:web_translations,slug',
            'tr_short_description'=> 'nullable|string|max:500',
            'tr_description'      => 'nullable|string',
            'tr_meta_title'       => 'nullable|string|max:255',
            'tr_meta_keywords'    => 'nullable|string|max:500',
            'tr_meta_description' => 'nullable|string|max:500',
            'en_name'             => 'required|string|max:255',
            'en_slug'             => 'required|string|max:255|unique:web_translations,slug',
            'en_short_description'=> 'nullable|string|max:500',
            'en_description'      => 'nullable|string',
            'en_meta_title'       => 'nullable|string|max:255',
            'en_meta_keywords'    => 'nullable|string|max:500',
            'en_meta_description' => 'nullable|string|max:500',
        ];
    }

    public function translationMessages(): array
    {
        return [
            '*.required'         => ':attribute alanı gereklidir.',
            '*.string'           => ':attribute geçerli bir metin olmalıdır.',
            '*.max'              => ':attribute en fazla :max karakter olmalıdır.',
            '*.unique'           => 'Bu :attribute daha önce kullanılmış.',
        ];
    }
}
