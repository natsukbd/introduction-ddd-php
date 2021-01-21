<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Domain\Models\CircleInvitations;

use IntroductionDDD\Chapter11\Domain\Models\Circles\Circle;
use IntroductionDDD\Chapter11\Domain\Models\Users\User;
use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class CircleInvitation
{
    /**
     * CircleInvitation constructor.
     * @param Circle $circle
     * @param User $fromUser
     * @param User $invitedUser
     */
    public function __construct(
        private Circle $circle,
        private User $fromUser,
        private User $invitedUser
    ) {
    }
}
