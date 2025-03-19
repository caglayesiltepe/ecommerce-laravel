<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Traits\WebTranslationRules;

class ProductRequest extends FormRequest
{
    use WebTranslationRules;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge([
            'category_id' => 'required',
            'brand_id' => 'required',
            'display_order' => 'integer|min:1',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:3072',
            'stock' => 'integer|required',
            'status' => 'boolean',
        ], $this->translationRules());
    }

    public function messages(): array
    {
        return array_merge([
            'category_id.required' => 'Kategori alanı zorunludur.',
            'brand_id.required' => 'Marka alanı zorunludur.',
            'stock.required' => 'Stok alanı zorunludur',
            'stock.integer' => 'Stok alanı geçerli bir tamsayı olmalıdır.',
            'display_order.integer' => 'Sıra numarası geçerli bir tamsayı olmalıdır.',
            'display_order.min' => 'Sıra numarası en az 1 olmalıdır.',
            'image.mimes' => 'Resim sadece jpg, jpeg, png, webp, svg formatlarında olabilir.',
            'image.max' => 'Resim dosyası 3MB\'tan büyük olamaz.',
            'status.boolean' => 'Durum geçerli bir boolean (true/false) olmalıdır.',
        ], $this->translationMessages());
    }
}
