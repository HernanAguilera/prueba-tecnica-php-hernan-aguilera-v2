# 📌 Challenge PHP

## 📌 Descripción

Este es el un ejemplo de una aplicación PHP que utiliza Doctrine ORM y Doctrine Migrations.

## 📌 Requerimientos

- Docker
- Docker Compose

## 📌 Tecnologías

- PHP 8.2
- MySQL 8.0
- Doctrine ORM
- Doctrine Migrations

## 📌 Instalación

1. Clonar el repositorio
2. Ejecutar `make up` o `docker-compose up -d --build`
3. Ejecutar `make install` o `docker-compose exec php composer install`
4. Abrir el navegador en `http://localhost:8082`

## 📌 Desarrollo

### 📌 Comandos

- `make up` o `docker-compose up -d --build`: Iniciar el contenedor de MySQL y PHP
- `make down` o`docker-compose down`: Detener el contenedor de MySQL y PHP
- `make install` o`docker-compose exec php composer install`: Instalar dependencias de Composer

### 📌 Configuración

La configuración de la base de datos se realiza en el archivo `docker-compose.yml` y en el archivo `.env`.

Para acceder a la base de datos, se utiliza el usuario `hernan` y la contraseña `secret`.

### 📌 Migraciones

Las migraciones se realizan en el archivo `src/migrations.php`.

Para ejecutar las migraciones, se utiliza el comando `make migrate` o `docker exec -it pc-php bash -c "./doctrine migrate"`.

### 📌 Tests

Los tests se realizan en el directorio `tests`.

Para ejecutar las migraciones, se utiliza el comando `docker-compose exec vendor/bin/doctrine-migrations migrate` o `make migrate-test`.

Para ejecutar los tests, se utiliza el comando `docker-compose exec vendor/bin/phpunit` o `make run-tests`.
