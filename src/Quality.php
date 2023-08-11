<?php

declare(strict_types=1);

namespace App;

final class Quality
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

    public function decrease(int $amount = 1): self
    {
        return new self($this->value - $amount);
    }

    public function increase(): self
    {
        return new self($this->value + 1);
    }
}
