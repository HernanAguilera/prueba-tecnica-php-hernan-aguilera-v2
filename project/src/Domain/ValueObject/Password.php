<?php

namespace App\Domain\ValueObject;

use InvalidArgumentException;

class Password
{
    const MESSAGE = 'La contraseña debe tener al menos 8 caracteres, una mayúscula, un número y un carácter especial.';
    private string $hash;

    public function __construct(string $password, bool $hashed = false)
    {
        if (!$hashed) {
            if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/[\W]/', $password)) {
                throw new InvalidArgumentException(self::MESSAGE);
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
