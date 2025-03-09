<?php

namespace App\Application\UseCase;

use App\Application\DTO\RegisterUserRequest;
use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Password;
use App\Domain\Event\UserRegisteredEvent;
use DomainException;

class RegisterUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(RegisterUserRequest $request): User
    {
        // Validar si el email ya existe
        $existingUser = $this->userRepository->findByEmail(new Email($request->email));
        if ($existingUser !== null) {
            throw new DomainException("El email ya está en uso.");
        }

        // Crear un nuevo usuario
        $user = new User(
            new Name($request->name),
            new Email($request->email),
            new Password($request->password)
        );

        // Guardar en el repositorio
        $this->userRepository->save($user);

        // Disparar evento de dominio
        $event = new UserRegisteredEvent($user);
        $this->dispatchEvent($event);

        return $user;
    }

    private function dispatchEvent(UserRegisteredEvent $event): void
    {
        // Simulación de evento (se puede integrar con un Event Bus real)
        // echo "Evento disparado: Usuario registrado con email " . $event->getUser()->getEmail();
    }
}
