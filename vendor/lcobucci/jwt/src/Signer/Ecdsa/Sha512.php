<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Signer\Ecdsa;

use Lcobucci\JWT\Signer\Ecdsa;

use const OPENSSL_ALGO_SHA512;

final class Sha512 extends Ecdsa
{
    public function algorithmId(): string
    {
        return 'ES512';
    }

    public function algorithm(): int
    {
        return OPENSSL_ALGO_SHA512;
    }

<<<<<<< HEAD
    public function keyLength(): int
    {
        return 132;
    }
=======
    public function pointLength(): int
    {
        return 132;
    }

    public function expectedKeyLength(): int
    {
        return 521;
    }
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
}
