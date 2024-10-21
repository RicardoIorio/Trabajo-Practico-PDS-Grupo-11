# Trabajo-Practico-PDS-Grupo-11
## Sistema de Login
Este proyecto es una simulación de un sistema de autenticación de usuarios (login) desarrollado en PHP con MySQL. El sistema permite a los usuarios registrarse y iniciar sesió. Además, incluye funcionalidades de administración y un registro de auditoría de los accesos.



Características

Registro de usuarios
Inicio de sesión
Perfiles de usuario (usuario normal y administrador)
Validación de contraseñas seguras
Registro de auditoría de accesos
Panel de administración

Requisitos

PHP 7.0 o superior
MySQL 5.6 o superior
Servidor web (por ejemplo, Apache)

Instalación

Clone el repositorio o descargue los archivos en su servidor web.
Importe la base de datos:

Cree una nueva base de datos en MySQL llamada login_system.
Importe el archivo database.sql en la base de datos creada.


Configure la conexión a la base de datos:

Abra el archivo configdatabase.php
Modifique las constantes Host, User y Pass con sus credenciales de MySQL.


Uso:

Acceda a la aplicación a través de su navegador web visitando la URL donde ha alojado el proyecto.
En la página principal, podrá elegir entre registrarse o iniciar sesión.
Para registrarse:

Haga clic en "Registrarse".
Complete el formulario con su nombre de usuario, correo electrónico y contraseña
Haga clic en "Registrarse".


Para iniciar sesión:

Ingrese su nombre de usuario y contraseña.
Haga clic en "Iniciar Sesión".


Una vez iniciada la sesión:

Los usuarios normales ingresaran a su perfil.
Los administradores serán redirigidos al panel de administración, donde podrán ver el registro de accesos.


Para cerrar sesión, haga clic en "Cerrar Sesión" en cualquier página una vez que haya iniciado sesión.



Seguridad

Las contraseñas se almacenan hasheadas en la base de datos.
Se implementa validación de entradas para prevenir inyecciones SQL y ataques XSS.

