<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Application\Circles\Invite;

final class CircleInviteCommand
{
    /**
     * CircleInviteCommand constructor.
     * @param string $circleId
     * @param string $fromUserId
     * @param string $inviteUserId
     */
    public function __construct(
        private string $circleId,
        private string $fromUserId,
        private string $inviteUserId
    ) {
    }

    public function circleId(): string
    {
        return $this->circleId;
    }

    public function fromUserId(): string
    {
        return $this->fromUserId;
    }

    public function inviteUserId(): string
    {
        return $this->inviteUserId;
    }
}
