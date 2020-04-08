<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

/**
 * Interface UserRepositoryInterface
 * @package IntroductionDDD\ApplicationService
 */
interface UserRepositoryInterface
{
    public function findByUserId(UserId $id): User;

    public function findByUserName(UserName $name): User;

    public function findByMailAddress(MailAddress $name): User;

    public function save(User $user): void;

    public function delete(User $user): void;
}
