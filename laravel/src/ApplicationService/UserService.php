<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

/**
 * Class UserService
 * @package IntroductionDDD\ApplicationService
 */
final class UserService
{
    private UserRepositoryInterface $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function exists(User $user): bool
    {
        // $duplicatedUser = $this->userRepository->findByUserName($user->getName());
        // 重複のルールを変更
        $duplicatedUser = $this->userRepository->findByMailAddress($user->getMailAddress());
        return $duplicatedUser !== null;
    }
}
