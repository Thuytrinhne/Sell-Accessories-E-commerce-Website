<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Signer;

use Lcobucci\JWT\Signer;

<<<<<<< HEAD
=======
/** @deprecated Deprecated since v4.3 */
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
final class None implements Signer
{
    public function algorithmId(): string
    {
        return 'none';
    }

    // @phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
    public function sign(string $payload, Key $key): string
    {
        return '';
    }

    // @phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
    public function verify(string $expected, string $payload, Key $key): bool
    {
        return $expected === '';
    }
}
