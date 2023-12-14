<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Signer;

use Lcobucci\JWT\Signer\Ecdsa\MultibyteStringConverter;
use Lcobucci\JWT\Signer\Ecdsa\SignatureConverter;

use const OPENSSL_KEYTYPE_EC;

abstract class Ecdsa extends OpenSSL
{
    private SignatureConverter $converter;

<<<<<<< HEAD
    public function __construct(SignatureConverter $converter)
    {
        $this->converter = $converter;
    }

    public static function create(): Ecdsa
    {
        return new static(new MultibyteStringConverter());  // @phpstan-ignore-line
=======
    public function __construct(?SignatureConverter $converter = null)
    {
        $this->converter = $converter ?? new MultibyteStringConverter();
    }

    /** @deprecated */
    public static function create(): Ecdsa
    {
        return new static(); // @phpstan-ignore-line
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
    }

    final public function sign(string $payload, Key $key): string
    {
        return $this->converter->fromAsn1(
            $this->createSignature($key->contents(), $key->passphrase(), $payload),
<<<<<<< HEAD
            $this->keyLength()
=======
            $this->pointLength()
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
        );
    }

    final public function verify(string $expected, string $payload, Key $key): bool
    {
        return $this->verifySignature(
<<<<<<< HEAD
            $this->converter->toAsn1($expected, $this->keyLength()),
=======
            $this->converter->toAsn1($expected, $this->pointLength()),
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
            $payload,
            $key->contents()
        );
    }

<<<<<<< HEAD
    final public function keyType(): int
    {
        return OPENSSL_KEYTYPE_EC;
    }

=======
    /** {@inheritdoc} */
    final protected function guardAgainstIncompatibleKey(int $type, int $lengthInBits): void
    {
        if ($type !== OPENSSL_KEYTYPE_EC) {
            throw InvalidKeyProvided::incompatibleKeyType(
                self::KEY_TYPE_MAP[OPENSSL_KEYTYPE_EC],
                self::KEY_TYPE_MAP[$type],
            );
        }

        $expectedKeyLength = $this->expectedKeyLength();

        if ($lengthInBits !== $expectedKeyLength) {
            throw InvalidKeyProvided::incompatibleKeyLength($expectedKeyLength, $lengthInBits);
        }
    }

    /** @internal */
    abstract public function expectedKeyLength(): int;

>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
    /**
     * Returns the length of each point in the signature, so that we can calculate and verify R and S points properly
     *
     * @internal
     */
<<<<<<< HEAD
    abstract public function keyLength(): int;
=======
    abstract public function pointLength(): int;
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
}
