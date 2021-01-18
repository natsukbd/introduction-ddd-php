<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11;

interface CircleRepositoryInterface
{
    public function save(): void;

    public function findById(CircleId $id): Circle;

    public function findByName(CircleName $name): Circle;
}
