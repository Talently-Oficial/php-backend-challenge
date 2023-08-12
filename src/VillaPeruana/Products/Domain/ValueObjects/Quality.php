<?php

declare(strict_types=1);

namespace App\VillaPeruana\Products\Domain\ValueObjects;

final class Quality
{
    private const MIN_QUALITY = 0;

    private const MAX_QUALITY = 50;

    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function decrease(int $amount = 1): self
    {
        return new self($this->value - $amount);
    }

    public function increase(): self
    {
        return new self($this->value + 1);
    }

    public function isGreaterThanMinValue()
    {
        return $this->value() > self::MIN_QUALITY;
    }

    public function isLessThanMaxValue()
    {
        return $this->value() < self::MAX_QUALITY;
    }

    public function reset()
    {
        return $this->decrease($this->value());
    }
}
