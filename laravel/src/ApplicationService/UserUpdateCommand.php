<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

final class UserUpdateCommand
{
    /**
     * @var string
     */
    private string $id;
    /**
     * @var string
     */
    public string $name;
    /**
     * @var string
     */
    public string $mailAddress;

    /**
     * UserUpdateCommand constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
