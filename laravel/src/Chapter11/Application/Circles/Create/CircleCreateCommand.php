<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Application\Circles\Create;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class CircleCreateCommand
{
    /**
     * CircleCreateCommand constructor.
     * @param string $userId
     * @param string $name
     */
    public function __construct(private string $userId, private string $name)
    {
    }

    public function userId(): string
    {
        return $this->userId;
    }

    public function name(): string
    {
        return $this->name;
    }
}
