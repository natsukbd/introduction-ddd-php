<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Domain\Models\Circles;

use IntroductionDDD\Chapter11\Domain\Models\Users\User;

interface CircleFactoryInterface
{
    public function create(CircleName $name, User $owner): Circle;
}
