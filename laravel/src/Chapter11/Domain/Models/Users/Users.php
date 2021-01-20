<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Domain\Models\Users;

final class Users
{
    /**
     * Users constructor.
     * @param array $items
     */
    public function __construct(private array $items)
    {
    }

    public function add(User $user): void
    {
        $this->items[] = $user;
    }

    public function count(): int
    {
        return count($this->items);
    }
}
