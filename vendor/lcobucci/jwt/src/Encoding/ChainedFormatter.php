<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Encoding;

use Lcobucci\JWT\ClaimsFormatter;

final class ChainedFormatter implements ClaimsFormatter
{
    /** @var list<ClaimsFormatter> */
    private array $formatters;

    public function __construct(ClaimsFormatter ...$formatters)
    {
        $this->formatters = $formatters;
    }

    public static function default(): self
    {
        return new self(new UnifyAudience(), new MicrosecondBasedDateConversion());
    }

<<<<<<< HEAD
=======
    public static function withUnixTimestampDates(): self
    {
        return new self(new UnifyAudience(), new UnixTimestampDates());
    }

>>>>>>> b441e5959d50a39b05a1a825e9ad1577d76e40bb
    /** @inheritdoc */
    public function formatClaims(array $claims): array
    {
        foreach ($this->formatters as $formatter) {
            $claims = $formatter->formatClaims($claims);
        }

        return $claims;
    }
}
