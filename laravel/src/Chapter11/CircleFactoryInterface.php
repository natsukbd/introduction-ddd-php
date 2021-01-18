<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11;

interface CircleFactoryInterface
{
    public function create(CircleName $name, User $owner): Circle;
}
