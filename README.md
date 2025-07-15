# Prueba Laravel 12 – API de Subscripciones

Este proyecto es la prueba técnica para el backend **Senior Backend Laravel 12 + MySQL 8**, siguiendo **Arquitectura Limpia (DDD/Hexagonal)** y los siguientes requerimientos:

- **Laravel 12** + PHP 8.4
- **Docker / Docker Compose** para entorno aislado
- **MySQL 8** como base de datos
- **API RESTful** (`/api/`)
- **Autenticación** con **Laravel Sanctum**
- **Roles & Permisos** con **Spatie Laravel Permission**
- **SoftDeletes**, **suscripciones**, y control de límite de usuarios por plan
- **DDD / Clean Architecture**: Capas de Domain, Application, Infrastructure, Interfaces
- **Manejo de sesion en Redis**: Se maneja el archivo de sesion en cache

---

## 🚀 Quick Start

### 1. Clona el repositorio

```bash
git clone git@github.com:DragoniX27/prueba_laravel_12.git
```

### 2. Monta el proyecto
```bash
./setup.sh
```

### 3. ¡Listo! Visita: http://localhost:8000/api/login para loguearte

Protegido con auth:sanctum

---

## 📊 Roles y permisos (Spatie)
### Roles definidos en RoleSeeder con guard sanctum

Se usan middlewares:

role:admin

Middleware registrado en bootstrap/app.php con:

```php
$middleware->alias([
  'role' => Spatie\Permission\Middlewares\RoleMiddleware::class,
  'permission' => Spatie\Permission\Middlewares\PermissionMiddleware::class,
]);
```

## 🧭 Estructura del proyecto

```text
app/
├── Domain/             // Entidades, ValueObjects, Reglas
├── Application/        // UseCases, DTOs, Lógica
├── Infrastructure/
│   └── Persistence/    // Eloquent, Repositorios
├── Interfaces/
│   └── Http/
│       ├── Controllers/
│       ├── Requests/   // Validaciones de entrada
│       └── Resources/  // JSON API Resources
```

## ✅ Funcionalidades incluidas
CRUD: plans, companies, subscriptions, users

## 🛠️ ¿Problemas?
Verifica:

.env: conexión mysql, variables de Docker

Contenedores: docker ps que muestre laravel-app y laravel-mysql

Logs en storage/logs/laravel.log

Rutas: php artisan route:list

