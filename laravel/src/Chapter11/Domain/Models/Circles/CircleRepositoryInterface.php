<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Domain\Models\Circles;

interface CircleRepositoryInterface
{
    public function save(Circle $circle): void;

    public function findById(CircleId $id): Circle;

    public function findByName(CircleName $name): Circle;
}
