<?php

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Doctrine\Migrations\Provider\SchemaProvider;
use Doctrine\Migrations\Provider\OrmSchemaProvider;
use App\Infrastructure\Persistence\Doctrine\DoctrineUserRepository;
use App\Infrastructure\Persistence\Doctrine\AddTypes;
use Dotenv\Dotenv;


$envFile = getenv('APP_ENV') === 'testing' ? '.env.testing' : '.env';

$docenv = Dotenv::createImmutable(__DIR__, $envFile);
$docenv->load();

// Configurar Doctrine ORM
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . "/src/Domain/Entity"], // Ruta de las entidades
    isDevMode: true
);

// Configuración de la conexión
$connectionParams = [
    'dbname'   => $_ENV['DB_NAME'],
    'user'     => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'host'     => $_ENV['DB_HOST'],
    'driver'   => 'pdo_mysql',
];

$connection = DriverManager::getConnection($connectionParams, $config);

// Crear EntityManager
$entityManager = new EntityManager($connection, $config);
// Crear repositorio de usuarios
$userRepository = new DoctrineUserRepository($entityManager);

// Configuración de Doctrine Migrations
$migrationsConfig = new PhpFile(__DIR__ . '/migrations.php');
$dependencyFactory = DependencyFactory::fromConnection(
    $migrationsConfig,
    new ExistingConnection($connection)
);

// 🔥 **Agregar el SchemaProvider necesario para `diff`**
$dependencyFactory->setService(SchemaProvider::class, new OrmSchemaProvider($entityManager));

// Agregar tipos de datos
AddTypes::add();

return $entityManager;
