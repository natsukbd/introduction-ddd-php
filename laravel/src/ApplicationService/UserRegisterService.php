<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

final class UserRegisterService
{
    private UserRepositoryInterface $userRepository;
    private UserService $userService;

    /**
     * UserRegisterService constructor.
     * @param UserRepositoryInterface $userRepository
     * @param UserService $userService
     */
    public function __construct(UserRepositoryInterface $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    /**
     * @param UserRegisterCommand $command
     */
    public function handle(UserRegisterCommand $command): void
    {
        $userName = new UserName($command->getName());
        $mailAddress = new MailAddress($command->getMailAddress());
        $user = User::createNewUser($userName, $mailAddress);

        if ($this->userService->exists($user)) {
            throw new \RuntimeException('ユーザは既に存在しています');
        }
        $this->userRepository->save($user);
    }
}
