<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Signer;

use const OPENSSL_KEYTYPE_RSA;

abstract class Rsa extends OpenSSL
{
<<<<<<< HEAD
=======
    private const MINIMUM_KEY_LENGTH = 2048;

>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
    final public function sign(string $payload, Key $key): string
    {
        return $this->createSignature($key->contents(), $key->passphrase(), $payload);
    }

    final public function verify(string $expected, string $payload, Key $key): bool
    {
        return $this->verifySignature($expected, $payload, $key->contents());
    }

<<<<<<< HEAD
    final public function keyType(): int
    {
        return OPENSSL_KEYTYPE_RSA;
=======
    final protected function guardAgainstIncompatibleKey(int $type, int $lengthInBits): void
    {
        if ($type !== OPENSSL_KEYTYPE_RSA) {
            throw InvalidKeyProvided::incompatibleKeyType(
                self::KEY_TYPE_MAP[OPENSSL_KEYTYPE_RSA],
                self::KEY_TYPE_MAP[$type],
            );
        }

        if ($lengthInBits < self::MINIMUM_KEY_LENGTH) {
            throw InvalidKeyProvided::tooShort(self::MINIMUM_KEY_LENGTH, $lengthInBits);
        }
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
    }
}
