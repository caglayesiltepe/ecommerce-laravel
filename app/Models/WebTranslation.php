<?php

namespace App\Models;

use App\Library\Enum\TranslationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class WebTranslation extends Model
{
    use HasFactory;

    protected $table = 'web_translations';

    /**
     * @return MorphTo
     */
    public function translatable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return int
     */
    public function getForeignId(): int
    {
        return $this->attributes['foreign_id'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setForeignId(int $value): void
    {
        $this->attributes['foreign_id'] = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->attributes['name'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setName(string $value): void
    {
        $this->attributes['name'] = $value;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->attributes['description'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setDescription(?string $value): void
    {
        $this->attributes['description'] = $value;
    }

    /**
     * @return string|null
     */
    public function getShortDescription(): ?string
    {
        return $this->attributes['short_description'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setShortDescription(?string $value): void
    {
        $this->attributes['short_description'] = $value;
    }

    /**
     * @return string|null
     */
    public function getMetaTitle(): ?string
    {
        return $this->attributes['meta_title'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setMetaTitle(?string $value): void
    {
        $this->attributes['meta_title'] = $value;
    }

    /**
     * @return string|null
     */
    public function getMetaKeywords(): ?string
    {
        return $this->attributes['meta_keywords'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setMetaKeywords(?string $value): void
    {
        $this->attributes['meta_keywords'] = $value;
    }

    /**
     * @return string|null
     */
    public function getMetaDescription(): ?string
    {
        return $this->attributes['meta_description'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setMetaDescription(?string $value): void
    {
        $this->attributes['meta_description'] = $value;
    }

    /**
     * @return string
     */
    public function getLanguageCode(): string
    {
        return $this->attributes['language_code'];
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setLanguageCode(string $value): void
    {
        $this->attributes['language_code'] = $value;
    }

    /**
     * @return TranslationType
     */
    public function getType(): TranslationType
    {
        return TranslationType::from($this->attributes['type']);
    }

    /**
     * @param TranslationType $value
     * @return void
     */
    public function setType(TranslationType $value): void
    {
        $this->attributes['type'] = $value;
    }
}
