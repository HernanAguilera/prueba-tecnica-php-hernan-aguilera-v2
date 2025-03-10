<?php

namespace App\Domain\Exception;

use DomainException;

class InvalidEmailException extends DomainException
{
    public function __construct()
    {
        parent::__construct("El email proporcionado no es válido.");
    }
}
