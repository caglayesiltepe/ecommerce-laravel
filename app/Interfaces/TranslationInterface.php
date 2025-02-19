<?php

namespace App\Interfaces;

interface TranslationInterface
{
    public function createTranslations(mixed $mixed, array $data): void;
}
