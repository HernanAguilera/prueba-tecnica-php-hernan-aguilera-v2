<?php

namespace App\Domain\Exception;

use DomainException;

class WeakPasswordException extends DomainException
{
    public function __construct()
    {
        parent::__construct("La contraseña es demasiado débil. Debe tener al menos 8 caracteres, una mayúscula, un número y un carácter especial.");
    }
}
