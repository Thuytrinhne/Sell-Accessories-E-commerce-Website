<?php
declare(strict_types=1);

namespace Lcobucci\Clock;

use DateTimeImmutable;
<<<<<<< HEAD
use StellaMaris\Clock\ClockInterface;
=======
use Psr\Clock\ClockInterface;
>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb

interface Clock extends ClockInterface
{
    public function now(): DateTimeImmutable;
}
