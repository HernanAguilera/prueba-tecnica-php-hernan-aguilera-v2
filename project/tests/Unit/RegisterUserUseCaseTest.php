<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Application\UseCase\RegisterUserUseCase;

class RegisterUserUseCaseTest extends TestCase
{
    public function testCasoDeUsoExiste()
    {
        $this->assertTrue(class_exists(RegisterUserUseCase::class));
    }
}
