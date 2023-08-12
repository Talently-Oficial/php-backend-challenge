<?php

declare(strict_types=1);

namespace App;

final class SellIn
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function decrease(): self
    {
        return new self($this->value - 1);
    }

    public function isThereTenDaysOrLess(): bool
    {
        return $this->value() <= 10;
    }

    public function isThereFiveDaysOrLess(): bool
    {
        return $this->value() <= 5;
    }

    public function isNegative(): bool
    {
        return $this->value() < 0;
    }
}
