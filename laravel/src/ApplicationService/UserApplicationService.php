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
     * @param string $mail
     */
    public function register(string $name, string $mail): void
    {
        $user = User::createNewUser(new UserName($name), new MailAddress($mail));
        if ($this->userService->exists($user)) {
            throw new RuntimeException('ユーザは既に存在しています');
        }
        $this->userRepository->save($user);
    }

    /**
     * @param string $userId
     * @return UserData
     */
    public function get(string $userId): UserData
    {
        $targetId = new UserId($userId);
        $user = $this->userRepository->findByUserId($targetId);
        return UserData::fromUser($user);
    }

    /**
     * @param UserUpdateCommand $command
     */
    public function update(UserUpdateCommand $command): void
    {
        $targetId = new UserId($command->getId());
        $user = $this->userRepository->findByUserId($targetId);
        if ($user === null) {
            throw new RuntimeException('ユーザーが存在しません');
        }

        if ($command->name !== null) {
            $user->changeName(new UserName($command->name));
            if ($this->userService->exists($user)) {
                throw new RuntimeException('ユーザ名は既に存在しています');
            }
        }

        if ($command->mailAddress !== null) {
            $user->changeMailAddress(new MailAddress($command->mailAddress));
        }

        $this->userRepository->save($user);
    }
}
