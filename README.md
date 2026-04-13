# consumer-electronics-challenge

## Descripción

Este proyecto es una aplicación monolítica desarrollada con Laravel 11 que implementa un sistema completo de gestión de usuarios.

Incluye:

- Interfaz con Blade (renderizado en servidor)
- API REST con autenticación basada en tokens
- Arquitectura limpia (Service + Repository)
- Paginación
- Logging
- Base de datos en Docker (MySQL)

El objetivo es demostrar buenas prácticas, arquitectura sólida y capacidad de desarrollo en pruebas técnicas.

---

## Tecnologías

- PHP 8.3
- Laravel 11
- MySQL 8 (Docker)
- Laravel Sanctum
- Blade
- Composer
- Node.js (opcional)

---

## Funcionalidades

- CRUD básico de usuarios
- Registro y login con token
- Hash de contraseñas
- Validación con FormRequest
- Paginación
- Logs del sistema
- Soft Deletes
- Seeders y factories

---

## Instalación

### 1. Clonar repositorio

git clone <repo-url>
cd user-crud

---

### 2. Instalar dependencias

composer install

---

### 3. Configurar entorno

cp .env.example .env

Editar:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hyundai_db
DB_USERNAME=root
DB_PASSWORD=root

---

## Docker (Base de datos)

docker-compose up -d

---

## Migraciones y seeders

php artisan migrate
php artisan db:seed

---

## Ejecutar proyecto

php artisan serve

---

## Uso con Blade

Listado de usuarios:
http://127.0.0.1:8000/users

Crear usuario:
http://127.0.0.1:8000/users/create

---

## API

### Registro

POST /api/register

{
  "name": "Jose",
  "email": "jose@test.com",
  "password": "123456"
}

---

### Login

POST /api/login

Respuesta:
{
  "user": {...},
  "token": "..."
}

---

### Ruta protegida

GET /api/users

Header:
Authorization: Bearer {token}

---

## Autenticación

- Hash con Hash::make
- Validación con Hash::check
- Tokens con Sanctum

---

## Logs

storage/logs/laravel.log

---

## Arquitectura

Controller → Service → Repository → Model

---

## Base de datos

CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    deleted_at TIMESTAMP NULL
);

---

## Comandos útiles

php artisan serve
php artisan migrate
php artisan db:seed

---

## Autor

Jose Trespalacios Bedoya

