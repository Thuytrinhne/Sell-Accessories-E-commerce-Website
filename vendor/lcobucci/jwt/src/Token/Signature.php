<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Token;

final class Signature
{
    private string $hash;
    private string $encoded;

    public function __construct(string $hash, string $encoded)
    {
        $this->hash    = $hash;
        $this->encoded = $encoded;
    }

<<<<<<< HEAD
=======
    /** @deprecated Deprecated since v4.3 */
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
    public static function fromEmptyData(): self
    {
        return new self('', '');
    }

    public function hash(): string
    {
        return $this->hash;
    }

    /**
     * Returns the encoded version of the signature
     */
    public function toString(): string
    {
        return $this->encoded;
    }
}
