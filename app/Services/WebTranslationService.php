<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class WebTranslationService
{
    public function updateTranslations(Model $model, $request): void
    {
        $translationsData = $this->translationData($request);

        foreach ($translationsData as $languageCode => $data) {
            $model->webTranslations()->updateOrCreate(
                ['language_code' => strtoupper($languageCode)],
                [
                    'name' => $data['name'] ?? null,
                    'slug' => $data['slug'] ?? null,
                    'short_description' => $data['short_description'] ?? null,
                    'description' => $data['description'] ?? null,
                    'meta_title' => $data['meta_title'] ?? null,
                    'meta_keywords' => $data['meta_keywords'] ?? null,
                    'meta_description' => $data['meta_description'] ?? null,
                ]
            );
        }
    }

    public function createTranslations(Model $model, $request): void
    {
        $translationsData = $this->translationData($request);

        foreach ($translationsData as $languageCode => $data) {
            $model->webTranslations()->create([
                'name' => $data['name'] ?? null,
                'slug' => $data['slug'] ?? null,
                'short_description' => $data['short_description'] ?? null,
                'description' => $data['description'] ?? null,
                'meta_title' => $data['meta_title'] ?? null,
                'meta_keywords' => $data['meta_keywords'] ?? null,
                'meta_description' => $data['meta_description'] ?? null,
                'language_code' => strtoupper($languageCode),
            ]);
        }
    }

    private function translationData($request): array
    {
        return collect($request->all())
            ->filter(function ($value, $key) {
                return preg_match('/^(\w{2})_(name|slug|short_description|description|meta_title|meta_keywords|meta_description)$/', $key);
            })
            ->mapToGroups(function ($value, $key) {
                preg_match('/^(\w{2})_(name|slug|short_description|description|meta_title|meta_keywords|meta_description)$/', $key, $matches);
                return [$matches[1] => [$matches[2] => $value]];
            })
            ->map(function ($items) {
                return array_merge(...$items);
            })->toArray();
    }
}
