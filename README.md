# Laravel Desarrollo Web

## 📌 Pre-requisitos

Asegúrate de tener instalados los siguientes programas en tu sistema:

-   PHP
-   Composer
-   MySQL

## 🚀 Instalación

1. Instalar Laravel de forma global con Composer:

    ```sh
    composer global require laravel/installer
    ```

2. Ejecutar el siguiente comando para instalar las dependencias:

    ```sh
    composer install
    ```

3. Configurar el entorno copiando el archivo de ejemplo y generando la clave de la aplicación:

    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. Ir a la carpeta del repositorio y ejecutar los siguientes comandos:

    ```sh
    npm install
    npm run build
    ```

5. En MySQL, crear la base de datos:

    ```sql
    CREATE DATABASE laravel_desarrolloweb;
    ```

6. Aplicar las migraciones para configurar la base de datos:

    ```sh
    php artisan migrate
    ```

7. Ejecutar el servidor de desarrollo con Vite y Laravel:
    ```sh
    composer run dev
    ```

## 🌍 Acceso a la Web

La aplicación estará disponible en:

-   **URL:** [http://localhost:8000/](http://localhost:8000/)
