<?php

namespace App\Domain\ValueObject;

use App\Domain\Exception\WeakPasswordException;
use InvalidArgumentException;

class Password
{
    private string $hash;

    public function __construct(string $password, bool $hashed = false)
    {
        if (!$hashed) {
            if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/[\W]/', $password)) {
                throw new WeakPasswordException();
            }
            $this->hash = password_hash($password, PASSWORD_BCRYPT);
        } else {
            $this->hash = $password;
        }
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function __toString(): string
    {
        return $this->hash;
    }
}
