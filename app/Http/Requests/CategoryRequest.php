<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Traits\WebTranslationRules;

class CategoryRequest extends FormRequest
{
    use WebTranslationRules;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge([
            'parent_id'     => 'required',
            'display_order' => 'integer|min:1',
            'image'         => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:3072',
            'small_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:3072',
            'icon'          => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:3072',
            'status'        => 'boolean',
        ], $this->translationRules());
    }

    public function messages(): array
    {
        return array_merge([
            'parent_id.required'     => 'Kategori alanı zorunludur.',
            'display_order.integer'  => 'Sıra numarası geçerli bir tamsayı olmalıdır.',
            'display_order.min'      => 'Sıra numarası en az 1 olmalıdır.',
            'image.mimes'            => 'Resim sadece jpg, jpeg, png, webp, svg formatlarında olabilir.',
            'image.max'              => 'Resim dosyası 3MB\'tan büyük olamaz.',
            'small_image.mimes'      => 'Küçük resim sadece jpg, jpeg, png, webp, svg formatlarında olabilir.',
            'small_image.max'        => 'Küçük resim dosyası 3MB\'tan büyük olamaz.',
            'icon.mimes'             => 'İkon sadece jpg, jpeg, png, webp, svg formatlarında olabilir.',
            'icon.max'               => 'İkon dosyası 3MB\'tan büyük olamaz.',
            'status.boolean'         => 'Durum geçerli bir boolean (true/false) olmalıdır.',
        ], $this->translationMessages());
    }
}
