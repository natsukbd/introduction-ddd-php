<?php

declare(strict_types=1);

namespace IntroductionDDD\Chapter11\Domain\Models\Circles;

use IntroductionDDD\Chapter11\Domain\Exceptions\ArgumentException;
use JetBrains\PhpStorm\Immutable;
use JetBrains\PhpStorm\Pure;

#[Immutable]
final class CircleName
{
    /**
     * CircleName constructor.
     * @param string $value
     * @throws ArgumentException
     */
    public function __construct(private string $value)
    {
        if (mb_strlen($this->value) < 3) {
            throw new ArgumentException('サークル名は3文字以上です。');
        }

        if (mb_strlen($this->value) > 20) {
            throw new ArgumentException('サークル名は20文字以下です。');
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    #[Pure]
    public function equals(
        CircleName $other
    ): bool {
        return $this->value() === $other->value();
    }
}
