<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Domain\ValueObject\Password;
use App\Domain\Exception\WeakPasswordException;

class PasswordTest extends TestCase
{
    public function testPasswordValido()
    {
        $password = new Password("SecureP@ss123");
        $this->assertTrue(password_verify("SecureP@ss123", $password->getHash()));
    }

    public function testPasswordDebil()
    {
        $this->expectException(WeakPasswordException::class);
        new Password("123456");
    }
}
