<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

final class UserData
{
    /**
     * @var string
     */
    private string $id;
    /**
     * @var string
     */
    private string $name;

    /**
     * UserData constructor.
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
