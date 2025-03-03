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
2. Ejecutar `docker-compose up -d --build` o `make up`
3. Ejecutar `docker-compose exec php composer install` o `make install`
4. Abrir el navegador en `http://localhost:8082`

## 📌 Desarrollo

### 📌 Comandos

- `docker-compose up -d --build` o `make up`: Iniciar el contenedor de MySQL y PHP
- `docker-compose down` o `make down`: Detener el contenedor de MySQL y PHP
- `docker-compose exec php composer install`: Instalar dependencias de Composer

### 📌 Configuración

La configuración de la base de datos se realiza en el archivo `docker-compose.yml` y en el archivo `.env`.

Para acceder a la base de datos, se utiliza el usuario `hernan` y la contraseña `secret`.

### 📌 Migraciones

Las migraciones se realizan en el archivo `src/migrations.php`.

Para ejecutar las migraciones, se utiliza el comando `docker-compose exec vendor/bin/doctrine-migrations migrate`.
