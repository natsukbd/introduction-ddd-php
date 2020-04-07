<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

use RuntimeException;

/**
 * Class UserApplicationService
 * @package IntroductionDDD\ApplicationService
 */
final class UserApplicationService
{
    private UserRepositoryInterface $userRepository;
    private UserService $userService;

    /**
     * UserApplicationService constructor.
     * @param UserRepositoryInterface $userRepository
     * @param UserService $userService
     */
    public function __construct(UserRepositoryInterface $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    /**
     * @param string $name
     */
    public function register(string $name): void
    {
        $user = User::createNewUser(new UserName($name));
        if ($this->userService->exists($user)) {
            throw new RuntimeException('ユーザは既に存在しています');
        }
        $this->userRepository->save($user);
    }

    /**
     * @param string $userId
     * @return User
     */
    public function get(string $userId): User
    {
        $targetId = new UserId($userId);
        return $this->userRepository->findByUserId($targetId);
    }

}