<?php

namespace App\Domain\Exception;

use DomainException;

class UserAlreadyExistsException extends DomainException
{
    public function __construct()
    {
        parent::__construct("El usuario con este email ya existe.");
    }
}
