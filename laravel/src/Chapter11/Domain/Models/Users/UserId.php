<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Domain\Models\Users;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class UserId
{
    /**
     * UserId constructor.
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
