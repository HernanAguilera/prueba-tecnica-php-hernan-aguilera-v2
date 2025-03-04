<?php

namespace App\Domain\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid;

class UserId
{
    private string $value;

    public function __construct(?string $id = null)
    {
        $this->value = $id ?? Uuid::uuid4()->toString();
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
