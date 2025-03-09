<?php
require '../vendor/autoload.php';

use App\Infrastructure\Controller\RegisterUserController;

// Cargar EntityManager desde cli-config.php
$entityManager = require '../cli-config.php';

// Definir rutas simples
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestUri === '/register' && $requestMethod === 'POST') {
    $controller = new RegisterUserController($entityManager);
    $controller->handle();
} else {
    http_response_code(404);
    echo json_encode(["error" => "Ruta no encontrada."]);
}
