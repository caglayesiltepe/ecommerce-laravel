<?php
namespace App\Http\Requests;

class OpenAIRequest
{
    protected string $prompt;
    protected string $model;
    protected int $maxTokens;

    /**
     * @param string $prompt
     * @param string $model
     * @param int $maxTokens
     */
    public function __construct(string $prompt, string $model = 'gpt2', int $maxTokens = 4096)
    {
        $this->prompt = $prompt;
        $this->model = $model;
        $this->maxTokens = $maxTokens;
    }

    /**
     * @return array
     */
    public function getPayload():array
    {
        return [
            'inputs' => $this->prompt,
            'parameters' => [
                'max_length' => $this->maxTokens,
            ],
        ];
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }
}
