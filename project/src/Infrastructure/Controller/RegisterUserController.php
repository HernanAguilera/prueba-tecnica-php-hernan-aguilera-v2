<?php

namespace App\Infrastructure\Controller;

use App\Application\DTO\RegisterUserRequest;
use App\Application\UseCase\RegisterUserUseCase;
use App\Infrastructure\Persistence\Doctrine\DoctrineUserRepository;
use Doctrine\ORM\EntityManagerInterface;

class RegisterUserController
{
    private RegisterUserUseCase $useCase;

    public function __construct(EntityManagerInterface $entityManager)
    {
        // Inyectamos el repositorio de usuarios con Doctrine
        $userRepository = new DoctrineUserRepository($entityManager);
        $this->useCase = new RegisterUserUseCase($userRepository);
    }

    public function handle(): void
    {
        // Configurar cabeceras de respuesta JSON
        header('Content-Type: application/json');

        // Leer y decodificar el cuerpo de la solicitud
        $inputData = json_decode(file_get_contents("php://input"), true);

        // Validar si los datos están completos
        if (!isset($inputData['name'], $inputData['email'], $inputData['password'])) {
            http_response_code(400);
            echo json_encode(["error" => "Todos los campos (name, email, password) son requeridos."]);
            return;
        }

        try {
            // Crear DTO con los datos de la solicitud
            $request = new RegisterUserRequest(
                $inputData['name'],
                $inputData['email'],
                $inputData['password']
            );

            // Ejecutar el caso de uso
            $user = $this->useCase->execute($request);

            // Responder con éxito
            http_response_code(201);
            echo json_encode([
                "id" => (string) $user->getId(),
                "name" => (string) $user->getName(),
                "email" => (string) $user->getEmail(),
                "createdAt" => $user->getCreatedAt()->format('Y-m-d H:i:s')
            ]);
        } catch (\Exception $e) {
            // Responder con error
            http_response_code(400);
            echo json_encode(["error" => $e->getMessage()]);
        }
    }
}
