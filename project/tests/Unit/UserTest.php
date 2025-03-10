<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Domain\Entity\User;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\Password;

class UserTest extends TestCase
{
    public function testCrearUsuario()
    {
        $user = new User(
            new Name("John Doe"),
            new Email("john@example.com"),
            new Password("SecureP@ss123")
        );

        $this->assertInstanceOf(User::class, $user);
    }
}
