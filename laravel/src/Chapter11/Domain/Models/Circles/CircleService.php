<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Domain\Models\Circles;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class CircleService
{
    /**
     * CircleService constructor.
     * @param CircleRepositoryInterface $circleRepository
     */
    public function __construct(private CircleRepositoryInterface $circleRepository)
    {
    }

    public function exists(Circle $circle): bool
    {
        $duplicated = $this->circleRepository->findByName($circle->name());
        return $duplicated !== null;
    }
}
