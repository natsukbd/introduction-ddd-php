<?php

declare(strict_types=1);

namespace IntroductionDDD\ApplicationService;

final class HighCohesionB
{
    private int $value3;
    private int $value4;

    /**
     * @return int
     */
    public function methodB(): int
    {
        return $this->value3 + $this->value4;
    }
}
