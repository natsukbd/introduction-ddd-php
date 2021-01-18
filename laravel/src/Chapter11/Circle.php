<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class Circle
{
    /**
     * Circle constructor.
     * @param CircleId $circleId
     * @param CircleName $circleName
     * @param User $user
     * @param User[] $members
     */
    public function __construct(
        private CircleId $circleId,
        private CircleName $circleName,
        private User $user,
        private array $members,
    ) {
    }

    public function id(): CircleId
    {
        return $this->circleId;
    }

    public function name(): CircleName
    {
        return $this->circleName;
    }

    public function owner(): User
    {
        return $this->user;
    }

    /**
     * @return User[]
     */
    public function members(): array
    {
        return $this->members;
    }
}
