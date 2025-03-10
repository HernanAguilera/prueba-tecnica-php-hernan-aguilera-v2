<?php

namespace App\Domain\ValueObject;

use InvalidArgumentException;

class Name
{
    private string $value;

    public function __construct(string $name)
    {
        if (strlen($name) < 3 || strlen($name) > 100) {
            throw new InvalidArgumentException("El nombre debe tener entre 3 y 100 caracteres.");
        }
        $this->value = $name;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
