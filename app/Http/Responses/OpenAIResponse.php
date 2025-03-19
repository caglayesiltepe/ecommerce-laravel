<?php

namespace App\Http\Responses;

class OpenAIResponse
{
    protected array $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed|null
     */
    public function getText(): mixed
    {
        return $this->data[0]['generated_text'] ?? null;
    }

    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return isset($this->data[0]['generated_text']);
    }
}
