<?php

class UrlGenerator
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('BASE_URL');
    }
    public function generateWelcomeUrl(): string
    {
        return $this->baseUrl . '/welcome';
    }
}