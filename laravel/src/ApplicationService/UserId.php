<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

use RuntimeException;

/**
 * Class UserId
 * @package IntroductionDDD\ApplicationService
 */
final class UserId
{
    /**
     * @var string
     */
    private string $value;

    /**
     * UserId constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        if ($value === '') {
            throw new RuntimeException('valueが空文字です');
        }
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
