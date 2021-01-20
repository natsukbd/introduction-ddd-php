<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Domain\Models\Users;

interface UserRepositoryInterface
{
    public function findById(UserId $id): User;
}
