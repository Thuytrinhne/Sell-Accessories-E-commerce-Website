<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Signer;

use InvalidArgumentException;
use Lcobucci\JWT\Exception;

final class CannotSignPayload extends InvalidArgumentException implements Exception
{
    public static function errorHappened(string $error): self
    {
<<<<<<< HEAD
        return new self('There was an error while creating the signature: ' . $error);
=======
        return new self('There was an error while creating the signature:' . $error);
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
    }
}
