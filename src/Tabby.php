<?php

namespace tahirfarman123\packageTabby;

use Illuminate\Support\Facades\Http;

class Tabby
{
    protected string $publicKey;
    protected string $secretKey;
    protected string $baseUrl;

    public function __construct($publicKey, $secretKey, $baseUrl)
    {
        $this->publicKey = $publicKey;
        $this->secretKey = $secretKey;
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function createSession(array $payload): array
    {
        $response = Http::withToken($this->secretKey)
            ->post("{$this->baseUrl}/checkout", $payload);

        if ($response->failed()) {
            throw new \Exception("Tabby API error: " . $response->body());
        }

        return $response->json();
    }

    public function getInstallments(array $payload): array
    {
        $response = Http::withToken($this->secretKey)
            ->post("{$this->baseUrl}/installments", $payload);

        return $response->json();
    }
}
