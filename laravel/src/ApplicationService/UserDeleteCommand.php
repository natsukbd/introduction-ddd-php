<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

/**
 * Class UserDeleteCommand
 * @package IntroductionDDD\ApplicationService
 */
final class UserDeleteCommand
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
