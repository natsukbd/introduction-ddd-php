<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

final class HighCohesionA
{
    private int $value1;
    private int $value2;

    /**
     * @return int
     */
    public function methodA(): int
    {
        return $this->value1 + $this->value2;
    }
}
