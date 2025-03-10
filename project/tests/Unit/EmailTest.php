<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Domain\ValueObject\Email;
use App\Domain\Exception\InvalidEmailException;

class EmailTest extends TestCase
{
    public function testEmailValido()
    {
        $email = new Email("test@example.com");
        $this->assertEquals("test@example.com", (string) $email);
    }

    public function testEmailInvalido()
    {
        $this->expectException(InvalidEmailException::class);
        new Email("email-invalido");
    }
}
