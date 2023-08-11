<?php

declare(strict_types=1);

namespace App;

final class Name
{
    private string $value;

    public function __construct(string $value)
    {
        // Validations and business rules related to name
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
