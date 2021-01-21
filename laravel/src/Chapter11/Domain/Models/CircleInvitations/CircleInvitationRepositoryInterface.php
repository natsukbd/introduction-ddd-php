<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Domain\Models\CircleInvitations;

interface CircleInvitationRepositoryInterface
{
    public function save(CircleInvitation $circleInvitation): void;
}
