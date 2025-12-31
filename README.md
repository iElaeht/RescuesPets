# RescuesPets - Proyecto de Rescate y Adopción Animal 🐾

RescuesPets es una plataforma web integral dedicada a la gestión de rescates y adopciones de mascotas. Permite centralizar el registro de animales auxiliados, gestionar sus expedientes y facilitar su transición hacia un nuevo hogar mediante un sistema de adopción dinámico y seguro.

## Tabla de Contenidos

* [Tecnologías](#tecnologías)
* [Instalación](#instalación)
* [Características Principales](#características)

---

## Tecnologías

* **Frontend:** HTML5, CSS3, JavaScript (ES6+), Bootstrap 5.
* **Backend:** PHP 8.x (Arquitectura orientada a objetos).
* **Base de Datos:** MySQL (Motor InnoDB para integridad referencial).
* **Otros:** Fetch API para comunicación asíncrona, FontAwesome para iconografía.

---

## Instalación

Sigue estos pasos para instalar y ejecutar el proyecto en tu máquina local:

### 1. Clona el repositorio

* git clone [https://github.com/tu-usuario/rescues-pets.git](https://github.com/tu-usuario/rescues-pets.git)
### 2. Configura la Base de Datos

* Abre tu gestor de base de datos (phpMyAdmin o MySQL Workbench).

* Crea una base de datos llamada RescuesPets.

* Importa el archivo SQL ubicado en la carpeta del proyecto: database/RescuesPets.sql

### 3. Ajusta la conexión en PHP

* Edita el archivo app/models/Connection.php con las credenciales de tu servidor local: PHP

* private $user = "root";
* private $pass = "root"; // Contraseña configurada

### 4. Servidor Local

* Copia la carpeta del proyecto en tu directorio de servidor (htdocs para XAMPP o www para WampServer) y accede desde: http://localhost/rescuespets/

# Características

* Registro de mascotas rescatadas: Gestión completa (CRUD) de animales con datos de especie, raza, género y condiciones de salud.

* Gestión de adopciones: Sistema inteligente que utiliza transacciones SQL para vincular adoptantes y cambiar el estado de la mascota automáticamente de "Disponible" a "Adoptado".

* Catálogo de mascotas: Interfaz visual dinámica que muestra únicamente las mascotas disponibles para adopción en tiempo real.

* Historial de Adopciones: Registro detallado de cada proceso con filtros de búsqueda por DNI o nombre del adoptante.

* Comunicación asíncrona: Uso de Fetch API para realizar registros y ediciones sin necesidad de recargar la página, mejorando la experiencia de usuario.

* Diseño Responsivo: Interfaz adaptada para una navegación fluida en dispositivos móviles, tablets y computadoras gracias a Bootstrap 5.

* Seguridad de Datos: Validaciones en el lado del servidor y cliente para asegurar que campos críticos como el DNI (8 dígitos) se registren correctamente.

