#!/bin/bash

echo "🚀 Construyendo y levantando los contenedores..."
docker compose -f stack-compose.yml up --build -d

echo "⏳ Esperando 10 segundos a que la base de datos arranque..."
sleep 10

echo "📦 Instalando  laravel/sanctum..."
docker exec -it laravel-12 composer require laravel/sanctum

echo "📦 Instalando  laravel/Spatie..."
docker exec -it laravel-12  composer require spatie/laravel-permission

echo "⚙️ Instalando dependencias de Laravel..."
docker exec -it laravel-12 composer install

echo "🔑 Generando clave de aplicación..."
docker exec -it laravel-12 php artisan key:generate

echo "🧬 Ejecutando migraciones..."
docker exec -it laravel-12 php artisan migrate:fresh

echo "✅ Listo. Laravel corriendo en http://localhost:8000"
