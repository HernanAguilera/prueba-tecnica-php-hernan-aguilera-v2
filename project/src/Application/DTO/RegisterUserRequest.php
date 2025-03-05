<?php

namespace App\Application\DTO;

use InvalidArgumentException;

class RegisterUserRequest
{
    public string $name;
    public string $email;
    public string $password;

    public function __construct(string $name, string $email, string $password)
    {
        if (strlen($name) < 3 || strlen($name) > 100) {
            throw new InvalidArgumentException("El nombre debe tener entre 3 y 100 caracteres.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Email inválido.");
        }

        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/[\W]/', $password)) {
            throw new InvalidArgumentException("La contraseña debe tener al menos 8 caracteres, una mayúscula, un número y un carácter especial.");
        }

        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
