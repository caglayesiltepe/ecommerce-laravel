<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use App\Http\Requests\OpenAIRequest;
use App\Http\Responses\OpenAIResponse as OpenAIResponseAlias;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Psr\Log\LoggerInterface;

class OpenAIService
{
    protected Client $client;
    protected mixed $apiKey;
    protected LoggerInterface $logger;
    protected string $apiUrl;
    protected int $requestCount = 0;

    public function __construct(Client $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->apiKey = env('HUGGINGFACE_API_KEY');
        $this->logger = $logger;
        $this->apiUrl = 'https://api-inference.huggingface.co/models/';
    }

    public function webTranslationSend(string $trName, string $model): array
    {
        return [
            'tr_description' => $this->generateRequest("Write a meaningful description in Turkish for the product named: $trName $model"),
            'tr_slug' => $this->generateRequest("Write a SEO-friendly Turkish slug for the product named: $trName $model", 50),
            'tr_meta_title' => $this->generateRequest("Write a SEO-friendly Turkish meta title for the product named: $trName $model", 100),
            'tr_meta_keywords' => $this->generateRequest("Write a SEO-friendly Turkish meta keywords for the product named: $trName $model", 1000),
            'tr_meta_description' => $this->generateRequest("Write a SEO-friendly Turkish meta description for the product named: $trName $model", 1000),
            'tr_short_description' => $this->generateRequest("Write a SEO-friendly Turkish short description for the product named: $trName $model", 300),

            'en_name' => $this->generateRequest("Translate '$trName' into English", 100),
            'en_description' => $this->generateRequest("Write a meaningful description in English for the product named: $trName $model"),
            'en_slug' => $this->generateRequest("Write a SEO-friendly English slug for the product named: $trName $model", 50),
            'en_meta_title' => $this->generateRequest("Write a SEO-friendly English meta title for the product named: $trName $model", 100),
            'en_meta_keywords' => $this->generateRequest("Write a SEO-friendly English meta keywords for the product named: $trName $model", 1000),
            'en_meta_description' => $this->generateRequest("Write a SEO-friendly English meta description for the product named: $trName $model", 1000),
            'en_short_description' => $this->generateRequest("Write a SEO-friendly English short description for the product named: $trName $model", 300),
        ];
    }

    private function sendRequest(OpenAIRequest $request, int $retryCount = 3): OpenAIResponseAlias
    {
        $attempt = 0;

        while ($attempt < $retryCount) {
            try {
                $response = $this->client->post($this->apiUrl . $request->getModel(), [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $this->apiKey,
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $request->getPayload(),
                ]);

                $data = json_decode($response->getBody()->getContents(), true);

                return new OpenAIResponseAlias($data);

            } catch (RequestException $e) {
                $attempt++;
                $this->logger->error('Hugging Face API request failed', [
                    'error' => $e->getMessage(),
                    'attempt' => $attempt,
                ]);

                if ($attempt >= $retryCount) {
                    throw new Exception('Hugging Face API istek hatası: ' . $e->getMessage());
                }

                // Her başarısız denemede 2 saniye bekle
                sleep(2);
            }
        }

        throw new Exception('Hugging Face API istek hatası: Maksimum deneme sayısı aşıldı.');
    }

    private function generateRequest(string $prompt, int $maxToken = 4096): mixed
    {
        $request = new OpenAIRequest($prompt, 'gpt2', $maxToken);
        $response = $this->sendRequest($request);

        $this->requestCount++;

        if ($this->requestCount % 5 === 0) {
            sleep(5);
        } else {
            sleep(1); // Diğer isteklerde 1 saniye bekle
        }

        return $response->isSuccessful() ? $response->getText() : null;
    }
}
