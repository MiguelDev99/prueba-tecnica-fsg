# Sistema de Gestión de Usuarios - Prueba Técnica FSG

Este proyecto implementa dos funcionalidades clave para la gestión de usuarios: **adjuntar foto de perfil** y **recuperación de contraseña**, como parte de una prueba técnica para el cliente FSG.

---

## Historias de Usuario Implementadas

### HUPRU001 - Adjuntar Foto de Usuario

**Actor:** Administrador de usuarios  
**Objetivo:** Adjuntar una imagen de perfil a los usuarios autenticados.  
**Flujo:**
1. El administrador accede al catálogo de usuarios.
2. Selecciona a un usuario específico.
3. Ingresa a la opción "Adjuntar foto".
4. Carga una imagen `.jpg`, `.jpeg` o `.png`.
5. Visualiza una previsualización antes de guardar.
6. Guarda la imagen, la cual se almacena en `storage/public`.
7. Recibe un mensaje de confirmación y es redirigido al detalle del usuario.

### HUPRU002 - Recuperar o Restablecer Contraseña

**Actor:** Todos los usuarios  
**Objetivo:** Permitir al usuario restablecer su contraseña si la ha olvidado.  
**Flujo:**
1. El usuario accede a "¿Olvidaste tu contraseña?" desde el login.
2. Ingresa su correo electrónico.
3. El sistema valida si el correo está en la base de datos.
4. Se genera y envía un código de verificación por email.
5. El usuario ingresa el código recibido.
6. Si es válido, se permite ingresar una nueva contraseña.
7. La contraseña se guarda en la base de datos (campo `usuarioPassword`) en formato `md5()`.
8. Se muestra el mensaje "Contraseña Restablecida" y se redirige al login.

---

## Tecnologías

- Laravel 10+
- Blade Templates
- Bootstrap 5 (via CDN)
- Mail (Laravel Mailable)
- PHP `md5()` (para autenticación basada en sistema existente)
- Sesiones para validación de código temporal

---

## Instalación rápida

1. Clonar repositorio:
   ```bash
   git clone https://github.com/MiguelDev99/prueba-tecnica-fsg.git
   cd tu-repo
   ```

2. Instalar dependencias:
   ```bash
   composer install
   ```

3. Ejecutar migraciones si aplica:
   ```bash
   php artisan migrate
   ```

4. Levantar el servidor:
   ```bash
   php artisan serve
   ```

---

## Notas importantes

- Las contraseñas están almacenadas usando `md5()` por compatibilidad con el sistema actual. No recomendado para producción moderna.
- El código de recuperación se guarda temporalmente en sesión, pero puede extenderse a persistencia en DB con expiración si se desea.
- Se pueden mejorar los mensajes de feedback y animaciones para mayor usabilidad.

---

## Contacto

Este proyecto fue realizado como parte de una prueba técnica para FSG. Para dudas o mejoras, contactar a Miguel Ojeda +57 3125650552.
