<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Application\Circles\Join;

final class CircleJoinCommand
{
    /**
     * CircleJoinCommand constructor.
     * @param string $userId
     * @param string $circleId
     */
    public function __construct(private string $userId, private string $circleId)
    {
    }

    public function userId(): string
    {
        return $this->userId;
    }

    public function circleId(): string
    {
        return $this->circleId;
    }
}
