<?php

class UrlGenerator
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('BASE_URL');
    }

    /**
     * Генерируем url страницы welcome
     */
    public function generateWelcomeUrl(): string
    {
        return $this->baseUrl . '/welcome';
    }
}