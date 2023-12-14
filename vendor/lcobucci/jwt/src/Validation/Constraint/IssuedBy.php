<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Validation\Constraint;

use Lcobucci\JWT\Token;
use Lcobucci\JWT\Validation\Constraint;
use Lcobucci\JWT\Validation\ConstraintViolation;

final class IssuedBy implements Constraint
{
    /** @var string[] */
    private array $issuers;

    public function __construct(string ...$issuers)
    {
        $this->issuers = $issuers;
    }

    public function assert(Token $token): void
    {
        if (! $token->hasBeenIssuedBy(...$this->issuers)) {
<<<<<<< HEAD
            throw new ConstraintViolation(
                'The token was not issued by the given issuers'
=======
            throw ConstraintViolation::error(
                'The token was not issued by the given issuers',
                $this
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
            );
        }
    }
}
