<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Traits\WebTranslationRules;

class BrandRequest extends FormRequest
{
    use WebTranslationRules;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge([
            'display_order' => 'integer|min:1',
            'logo'          => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:3072',
            'status'        => 'boolean',
        ], $this->translationRules());
    }

    public function messages(): array
    {
        return array_merge([
            'display_order.integer'  => 'Sıra numarası geçerli bir tamsayı olmalıdır.',
            'display_order.min'      => 'Sıra numarası en az 1 olmalıdır.',
            'logo.mimes'             => 'Logo sadece jpg, jpeg, png, webp, svg formatlarında olabilir.',
            'logo.max'               => 'Logo dosyası 3MB\'tan büyük olamaz.',
            'status.boolean'         => 'Durum geçerli bir boolean (true/false) olmalıdır.',
        ], $this->translationMessages());
    }
}
