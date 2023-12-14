<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Signer\Hmac;

use Lcobucci\JWT\Signer\Hmac;

final class Sha256 extends Hmac
{
    public function algorithmId(): string
    {
        return 'HS256';
    }

    public function algorithm(): string
    {
        return 'sha256';
    }
<<<<<<< HEAD
=======

    public function minimumBitsLengthForKey(): int
    {
        return 256;
    }
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
}
