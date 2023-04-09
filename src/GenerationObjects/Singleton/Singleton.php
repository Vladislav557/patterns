<?php

namespace App\Generation\Singleton;

class Singleton
{
    // Для удосбства сделаем экземпляр класса массивом, для дальнейшего тестирования
    private static ?self $instance = null;
    private array $properties = [];

    // Запрещаем создание экземпляра класса из вне
    private function __construct() {}   
    private function __clone() {}

    // Содаем единственный способ созадть экземпляр класса
    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Создаем интерфейс для работы с единственным экземпляром класса
    public function setProperty(string $key, string $value): void
    {
        $this->properties[$key] = $value;
    }

    public function getProperty(string $key): string
    {
        return $this->properties[$key] ?? null;
    }
}

