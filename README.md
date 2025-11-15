# 🧑‍💻 Renteria.dev Portfolio Manager

Plataforma web personal profesional, diseñada como carta de presentación dinámica para mostrar proyectos, experiencia y habilidades a reclutadores o clientes. El sistema permite la gestión completa del contenido del portafolio desde un panel administrativo asegurado.

## 🚀 1. Arquitectura y Stack Tecnológico

* **Core:** Laravel 10/11
* **Base de Datos:** PostgreSQL
* **Frontend:** Laravel Breeze + Tailwind CSS
* **Control de Contenido:** El sistema centraliza el CV y los datos de contacto en una única tabla (`profiles`) para gestión simplificada.

## 🔑 2. Flujo de Contenido Dinámico

El objetivo es separar el diseño del contenido, permitiendo la edición total de la información pública desde el panel de administrador.

| Sección Pública | Origen del Dato | Gestión (Panel Admin) |
| :--- | :--- | :--- |
| **Presentación/Resumen** | Campo `resumen` en `profiles` | Editar Perfil/CV |
| **Proyectos Destacados** | Tabla `projects` (CRUD completo) | Gestionar Proyectos |
| **Experiencia Laboral** | Campo `experiencia_laboral` en `profiles` | Editar Perfil/CV |
| **Enlaces Sociales** | Campos URL en `profiles` | Editar Perfil/CV |

## 🛠️ 3. Guía de Instalación Local

Sigue estos pasos para poner el portafolio en funcionamiento:

### 3.1 Configuración de Entorno

1.  **Clonar y Entrar al Directorio:**
    ```bash
    git clone [https://aws.amazon.com/es/what-is/repo/](https://aws.amazon.com/es/what-is/repo/) RenteriaDev
    cd RenteriaDev
    composer install
    ```
2.  **Configurar DB:** Asegúrate de que tu archivo `.env` apunte a una base de datos PostgreSQL (`rentedev_db`).
3.  **Generar Clave y Compilar Assets:**
    ```bash
    php artisan key:generate
    npm install
    npm run dev
    ```

### 3.2 Migraciones y Siembra

El siguiente comando crea todas las tablas (`users`, `profiles`, `projects`) y la cuenta de administrador inicial con la contraseña ya *hasheada*.

```bash
php artisan migrate:fresh --seed

🔐 4. Acceso al Panel Administrativo
Ruta de Login: http://127.0.0.1:8000/login

Credenciales:

Email: admin@renteria.dev

Contraseña: password

Una vez dentro, utiliza los enlaces "Gestionar Proyectos" y "Editar Perfil/CV" para actualizar el contenido dinámico de la página principal.