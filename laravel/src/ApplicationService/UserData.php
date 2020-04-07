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
     * @var string
     */
    private string $mailAddress;

    /**
     * UserData constructor.
     * @param string $id
     * @param string $name
     * @param string $mailAddress
     */
    private function __construct(string $id, string $name, string $mailAddress)
    {
        $this->id = $id;
        $this->name = $name;
        $this->mailAddress = $mailAddress;
    }

    /**
     * @param User $user
     * @return static
     */
    public static function fromUser(User $user): self
    {
        return new static(
            $user->getUserId()->getValue(),
            $user->getName()->getValue(),
            $user->getMailAddress()->getValue()
        );
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

    /**
     * @return string
     */
    public function getMailAddress(): string
    {
        return $this->mailAddress;
    }
}
