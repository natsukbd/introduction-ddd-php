<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class CircleId
{
    /**
     * CircleId constructor.
     * @param string $value
     */
    public function __construct(private string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }
}
