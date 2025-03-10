<?php

namespace Tests\Integration;

use PHPUnit\Framework\TestCase;
use App\Infrastructure\Persistence\Doctrine\DoctrineUserRepository;
use App\Domain\Entity\User;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\Password;

class DoctrineUserRepositoryTest extends TestCase
{
    private DoctrineUserRepository $repository;

    protected function setUp(): void
    {
        $entityManager = require 'cli-config.php';
        $this->repository = new DoctrineUserRepository($entityManager);
    }

    protected function tearDown(): void
    {
        $this->repository->deleteAll();
    }

    public function testGuardarUsuario()
    {
        $user = new User(
            new Name("John Doe"),
            new Email("john@example.com"),
            new Password("SecureP@ss123")
        );

        $this->repository->save($user);
        $savedUser = $this->repository->findById($user->getId());

        $this->assertNotNull($savedUser);
        $this->assertEquals((string) $user->getId(), (string) $savedUser->getId());
    }
}
