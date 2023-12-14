<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Signer\Hmac;

use Lcobucci\JWT\Signer\Hmac;

final class Sha512 extends Hmac
{
    public function algorithmId(): string
    {
        return 'HS512';
    }

    public function algorithm(): string
    {
        return 'sha512';
    }
<<<<<<< HEAD
=======

    public function minimumBitsLengthForKey(): int
    {
        return 512;
    }
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
}
