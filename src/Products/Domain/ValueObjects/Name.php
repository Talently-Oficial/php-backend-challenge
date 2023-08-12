<?php

declare(strict_types=1);

namespace App\Products\Domain\ValueObjects;

final class Name
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
