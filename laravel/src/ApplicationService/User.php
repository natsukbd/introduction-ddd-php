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
     * User constructor.
     * @param UserId $userId
     * @param UserName $name
     */
    private function __construct(UserId $userId, UserName $name)
    {
        $this->userId = $userId;
        $this->name = $name;
    }

    /**
     * @param UserName $userName
     * @return static
     */
    public static function createNewUser(UserName $userName): self
    {
        return new static(new UserId(), $userName);
    }

    /**
     * @param UserId $userId
     * @param UserName $userName
     * @return static
     */
    public static function createUser(UserId $userId, UserName $userName): self
    {
        return new static($userId, $userName);
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
}

