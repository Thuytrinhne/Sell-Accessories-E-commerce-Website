<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Validation\Constraint;

use Lcobucci\JWT\Token;
use Lcobucci\JWT\Validation\Constraint;
use Lcobucci\JWT\Validation\ConstraintViolation;

final class IdentifiedBy implements Constraint
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function assert(Token $token): void
    {
        if (! $token->isIdentifiedBy($this->id)) {
<<<<<<< HEAD
            throw new ConstraintViolation(
                'The token is not identified with the expected ID'
=======
            throw ConstraintViolation::error(
                'The token is not identified with the expected ID',
                $this
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
            );
        }
    }
}
