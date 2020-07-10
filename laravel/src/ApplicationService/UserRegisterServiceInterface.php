<?php

namespace IntroductionDDD\ApplicationService;

/**
 * Interface UserRegisterServiceInterface
 * @package IntroductionDDD\ApplicationService
 */
interface UserRegisterServiceInterface
{
    /**
     * @param UserRegisterCommand $command
     * @return mixed
     */
    public function handle(UserRegisterCommand $command);
}
