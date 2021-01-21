<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Domain\Models\Circles;

use IntroductionDDD\Chapter11\Domain\Models\Users\User;
use IntroductionDDD\Chapter11\Domain\Models\Users\Users;
use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class Circle
{
    /**
     * Circle constructor.
     * @param CircleId $circleId
     * @param CircleName $circleName
     * @param User $user
     * @param Users $members
     */
    public function __construct(
        private CircleId $circleId,
        private CircleName $circleName,
        private User $user,
        private Users $members,
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

    // オーナーとメンバーが別管理になっている
    public function owner(): User
    {
        return $this->user;
    }

    public function members(): Users
    {
        return $this->members;
    }
}
