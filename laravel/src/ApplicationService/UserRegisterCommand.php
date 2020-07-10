<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

final class UserRegisterCommand
{
    /**
     * @var string
     */
    private string $name;
    /**
     * @var string
     */
    private string $mailAddress;

    /**
     * UserRegisterCommand constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMailAddress(): string
    {
        return $this->mailAddress;
    }
}
