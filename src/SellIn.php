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
}
