<?php

namespace LoomPHP;

class Cache
{
    private static ?\Predis\Client $client = null;

    public static function client(): \Predis\Client
    {
        if (self::$client === null) {
            self::$client = new \Predis\Client(Config::redis());
        }
        return self::$client;
    }

    public static function get(string $key): mixed
    {
        $value = self::client()->get($key);
        return $value !== null ? unserialize($value) : null;
    }

    public static function set(string $key, mixed $value, int $ttl = 3600): void
    {
        self::client()->setex($key, $ttl, serialize($value));
    }

    public static function del(string $key): void
    {
        self::client()->del([$key]);
    }

    public static function remember(
        string $key,
        int $ttl,
        callable $callback,
    ): mixed {
        $cached = self::get($key);
        if ($cached !== null) {
            return $cached;
        }
        $value = $callback();
        self::set($key, $value, $ttl);
        return $value;
    }
}
