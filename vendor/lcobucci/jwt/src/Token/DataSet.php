<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Token;

use function array_key_exists;

final class DataSet
{
    /** @var array<string, mixed> */
    private array $data;
    private string $encoded;

<<<<<<< HEAD
    /** @param mixed[] $data */
=======
    /** @param array<string, mixed> $data */
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
    public function __construct(array $data, string $encoded)
    {
        $this->data    = $data;
        $this->encoded = $encoded;
    }

    /**
     * @param mixed|null $default
     *
     * @return mixed|null
     */
    public function get(string $name, $default = null)
    {
        return $this->data[$name] ?? $default;
    }

    public function has(string $name): bool
    {
        return array_key_exists($name, $this->data);
    }

<<<<<<< HEAD
    /** @return mixed[] */
=======
    /** @return array<string, mixed> */
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
    public function all(): array
    {
        return $this->data;
    }

    public function toString(): string
    {
        return $this->encoded;
    }
}
