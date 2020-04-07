<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

/**
 * Class MailAddress
 * @package IntroductionDDD\ApplicationService
 */
final class MailAddress
{
    /**
     * @var string
     */
    private string $value;

    /**
     * MailAddress constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
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
