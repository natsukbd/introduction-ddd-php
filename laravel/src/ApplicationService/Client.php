<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

/**
 * Class Client
 * @package IntroductionDDD\ApplicationService
 */
final class Client
{
    private UserApplicationService $userApplicationService;

    private UserRegisterServiceInterface $userRegisterService;

    public function changeName(string $id, string $name): void
    {
        $target = $this->userApplicationService->get($id);
        $newName = new UserName($name);
        // ドメインオブジェクトを公開したことによる意図せぬ呼び出し
        $target->changeName($newName);
    }

    public function register(string $name): void
    {
        $command = new UserRegisterCommand($name);
        $this->userRegisterService->handle($command);
    }
}
