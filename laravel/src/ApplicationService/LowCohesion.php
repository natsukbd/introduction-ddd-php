<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

/**
 * Class LowCohesion
 * @package IntroductionDDD\ApplicationService
 */
final class LowCohesion
{
    private int $value1;
    private int $value2;
    private int $value3;
    private int $value4;

    /**
     * @return int
     */
    public function methodA(): int
    {
        return $this->value1 + $this->value2;
    }

    /**
     * @return int
     */
    public function methodB(): int
    {
        return $this->value3 + $this->value4;
    }
}
