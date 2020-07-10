<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

use RuntimeException;

/**
 * Class UserDeleteService
 * @package IntroductionDDD\ApplicationService
 */
final class UserDeleteService
{
    private UserRepositoryInterface $userRepository;

    /**
     * UserDeleteService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserDeleteCommand $command
     */
    public function handle(UserDeleteCommand $command): void
    {
        $userId = new UserId($command->getId());
        $user = $this->userRepository->findByUserId($userId);
        if ($user === null) {
            throw new RuntimeException('user not found. id: ' . $userId->getValue());
        }
        $this->userRepository->delete($user);
    }
}
