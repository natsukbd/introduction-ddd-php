<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

use RuntimeException;

/**
 * Class UserName
 * @package IntroductionDDD\ApplicationService
 */
final class UserName
{
    /**
     * @var string
     */
    private string $value;

    /**
     * UserName constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (mb_strlen($value) < 3) {
            throw new RuntimeException('ユーザ名は3文字以上です。');
        }
        if (mb_strlen($value) > 20) {
            throw new RuntimeException('ユーザ名は20文字以下です。');
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
