# Prueba Laravel 12 – API de Subscripciones

Este proyecto es la prueba técnica para el backend **Senior Backend Laravel 12 + MySQL 8**, siguiendo **Arquitectura Limpia (DDD/Hexagonal)** y los siguientes requerimientos:

- **Laravel 12** + PHP 8.4
- **Docker / Docker Compose** para entorno aislado
- **MySQL 8** como base de datos
- **API RESTful** con versionado (`/api/v1`)
- **Autenticación** con **Laravel Sanctum**
- **Roles & Permisos** con **Spatie Laravel Permission**
- **SoftDeletes**, **suscripciones**, y control de límite de usuarios por plan
- **DDD / Clean Architecture**: Capas de Domain, Application, Infrastructure, Interfaces

---

## 🚀 Quick Start

### 1. Clona el repositorio
```bash
git clone git@github.com:DragoniX27/prueba_laravel_12.git
cd prueba_laravel_12
2. Compone el proyecto

docker-compose up -d --build
3. Configura .env y clave

docker exec -it laravel-app php artisan key:generate
4. Ejecuta migraciones y seeders

docker exec -it laravel-app php artisan migrate --seed
5. ¡Listo! Visita: http://localhost:8000/api/v1
🔐 Autenticación (Sanctum)
POST /api/v1/login → { email, password }

Respuesta: { "access_token": "...", "token_type": "Bearer" }

Guard: sanctum

Valida que la compañía del usuario tenga suscripción activa

POST /api/v1/logout

Protegido con auth:sanctum

📊 Roles y permisos (Spatie)
Roles definidos en RoleSeeder con guard sanctum

Se usan middlewares:

role:admin

permission:edit companies

Middleware registrado en bootstrap/app.php con:

php
$middleware->alias([
  'role' => Spatie\Permission\Middlewares\RoleMiddleware::class,
  'permission' => Spatie\Permission\Middlewares\PermissionMiddleware::class,
]);
🧭 Estructura del proyecto
text
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
✅ Funcionalidades incluidas
CRUD: plans, companies, subscriptions, users

SoftDeletes activado en Plan y Company

Al crear/actualizar Company:

Si viene plan_id distinto al actual → crea nueva suscripción y desactiva la anterior

En StoreUserRequest: valida que la compañía no supere el límite de usuarios del plan

hasOneThrough en Companie para acceder directamente al Plan activo

🧪 Pruebas
Incluye factories y seeder inicial:

UserFactory asigna rol automáticamente

RoleSeeder, PlanSeeder, CompanySeeder, SubscriptionSeeder, UserSeeder

Test de login, creación de usuario y validación de límite

Puedes agregar feature tests con Pest/PHPUnit para:

Autenticación

Creación de usuarios

Validación de límite de usuarios

📘 Insomnia / Postman
Dentro del directorio hay un ejemplo prueba_laravel_12.postman_collection.json que incluye:

Login → guarda auth_token en variable de entorno

Demás peticiones protegidas y logout

✍️ Sugerencias para mejorar
Agregar Swagger/OpenAPI docs

Recursos paginados (ResourceCollection) en responses

Soporte para tenant_id en multiempresas

Logs, auditoría e integración con Sentry

Tests end-to-end (Laravel Dusk o Pest Browser)

🛠️ ¿Problemas?
Verifica:

.env: conexión mysql, variables de Docker

Contenedores: docker ps que muestre laravel-app y laravel-mysql

Logs en storage/logs/laravel.log

Rutas: php artisan route:list

