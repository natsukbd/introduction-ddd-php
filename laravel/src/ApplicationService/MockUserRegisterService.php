<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

use RuntimeException;

/**
 * Class MockUserRegisterService
 * @package IntroductionDDD\ApplicationService
 */
final class MockUserRegisterService implements UserRegisterServiceInterface
{
    /**
     * @param UserRegisterCommand $command
     * @return mixed|void
     */
    public function handle(UserRegisterCommand $command)
    {
        throw new RuntimeException($command->getName());
    }
}
