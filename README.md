

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


<p align="center"><a href="https://livewire.laravel.com/" target="_blank"><img src="https://raw.githubusercontent.com/livewire/livewire/main/art/readme_logo.png" width="400" alt="Laravel Logo"></a></p>

<p align="center"><a href="https://tailwindcss.com/" target="_blank"><img src="https://raw.githubusercontent.com/tailwindlabs/tailwindcss/HEAD/.github/logo-dark.svg" width="400" alt="Laravel Logo"></a></p>


<a  href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Tailwind CSS & Livewire Project

Este es un proyecto para una prueba tecnica, la cual consiste en crear una pagina de tareas periodicas. Dichas tareas se van a poder agrupar en grupos. Al deberse de tareas periodicas, cuando se crean se asignan un rango de fechas y una frecuencia, por lo que mientras se este en el rango establecido y dependiendo de la frecuencia la tarea se volverá a poner como **no completada**.

## Descripción

Este proyecto utiliza las siguientes tecnologías:

- **Laravel**: Un framework de PHP para el desarrollo de aplicaciones web.
- **Tailwind CSS**: Un framework de CSS de utilidad que facilita la creación de interfaces de usuario estilizadas y responsivas.
- **Livewire**: Una biblioteca de Laravel para la creación de interfaces de usuario interactivas sin JavaScript.

## Requisitos Previos

- PHP >= 7.4
- Composer
- MySQL
- Node.js
- NPM o Yarn

## Diagrama de base de datos
<img src="public/DiagramDDBB.png"  alt="Diagrama de base de datos">
En este diagrama de pueden apreciar 7 tablas, de las cuales las 4 de abajo vienen por defecto en las migraciones de laravel.

La atención esta puesta en las 3 del medio **(users,groups,tasks)** la primera tabla users, va a almacenar los usuarios que se registren en la pagina web, la tabla tasks va a almacenar las tareas que se vayan creando y la tabla groups los grupos que se vayan creado.

La relación que se puede ver en el diagrama es de **uno a muchos** porque un solo registro en la tabla de grupos puede tener múltiples registros relacionados en la tabla de tareas, pero cada registro en la tabla de tareas solo puede estar asociado a un único registro en la tabla de grupos, esto se implementa mediante la colocación de una clave foránea en la tabla de tareas que hace referencia a la clave primaria de la tabla de grupos.

## Instalación y puesta en marcha

1. Clona este repositorio en tu máquina local:

   ```bash
   git clone https://github.com/Samuelrobdia/PruebaTecnica.git

2. Instalar las dependencias PHP
    ```bash
    composer install

3. Instalar las dependencias Node.js
    ```bash
    npm install o yarn install

4. Copiar el archivo de entorno y configura la base de datos
    ```bash
    cp .env.example .env
    php artisan key:generate

5. Configurar las credenciales de la base de datos
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=pruebaTecnica
    DB_USERNAME={{user}}
    DB_PASSWORD={{password}}

6. Ejecutar las migraciones
   ```bash
   php artisan migrate 

7. Iniciar el servidor de vite
    ```bash
    npm run dev

8. Iniciar el servidor de desarrollo
   ```bash
   php artisan serve

9. Visitar la url 
    ```bash
    http://localhost:8000

