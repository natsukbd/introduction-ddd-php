<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

use Ramsey\Uuid\Uuid;

/**
 * Class User
 * @package IntroductionDDD\ApplicationService
 */
final class User
{
    /**
     * @var UserId
     */
    private UserId $userId;
    /**
     * @var UserName
     */
    private UserName $name;
    /**
     * @var MailAddress
     */
    private MailAddress $mailAddress;

    /**
     * User constructor.
     * @param UserId $userId
     * @param UserName $name
     * @param MailAddress $mailAddress
     */
    private function __construct(UserId $userId, UserName $name, MailAddress $mailAddress)
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->mailAddress = $mailAddress;
    }

    /**
     * @param UserName $userName
     * @param MailAddress $mailAddress
     * @return static
     */
    public static function createNewUser(UserName $userName, MailAddress $mailAddress): self
    {
        return new static(new UserId(Uuid::uuid4()->toString()), $userName, $mailAddress);
    }

    /**
     * @param UserId $userId
     * @param UserName $userName
     * @param MailAddress $mailAddress
     * @return static
     */
    public static function createUser(UserId $userId, UserName $userName, MailAddress $mailAddress): self
    {
        return new static($userId, $userName, $mailAddress);
    }

    /**
     * @param UserName $name
     */
    public function changeName(UserName $name): void
    {
        $this->name = $name;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->userId;
    }

    /**
     * @return UserName
     */
    public function getName(): UserName
    {
        return $this->name;
    }

    /**
     * @return MailAddress
     */
    public function getMailAddress(): MailAddress
    {
        return $this->mailAddress;
    }
}

