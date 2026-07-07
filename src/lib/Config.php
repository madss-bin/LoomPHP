<?php

namespace LoomPHP;

class Config
{
    private static ?array $config = null;

    private static function load(): array
    {
        if (self::$config === null) {
            self::$config = [
                "redis" => [
                    "scheme" => "tcp",
                    "host" => getenv("REDIS_HOST") ?: "127.0.0.1",
                    "port" => (int) (getenv("REDIS_PORT") ?: 6379),
                ],
                "trailing_slash" => getenv("TRAILING_SLASH") ?: "never",
            ];
        }
        return self::$config;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return self::load()[$key] ?? $default;
    }

    public static function redis(): array
    {
        return self::load()["redis"];
    }
}
