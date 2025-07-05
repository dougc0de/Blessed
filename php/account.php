<?php
session_start();

if (empty($_SESSION['logged'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi cuenta</title>
</head>

<body>
    <h1>Bienvenido, <?= htmlspecialchars($user) ?>!</h1>

    <p>Esta es tu zona privada. Aquí colocarás opciones de perfil,
        pedidos, ajustes, etc.</p>

    <!-- En el futuro pondrás un enlace a logout -->
    <script>
        // Mostrar errores de login si existen
        document.addEventListener('DOMContentLoaded', function() {
            // Verificar si hay un error almacenado
            const error = sessionStorage.getItem('login_error');
            const savedEmail = sessionStorage.getItem('login_email');

            if (error) {
                // Crear elemento de error
                const errorDiv = document.createElement('div');
                errorDiv.className = 'alert alert-danger mb-4';
                errorDiv.textContent = error;

                // Insertar antes del formulario
                const form = document.querySelector('form[action="login.php"]');
                if (form) {
                    form.parentNode.insertBefore(errorDiv, form);

                    // Rellenar email si existe
                    const emailInput = form.querySelector('input[name="email"]');
                    if (emailInput && savedEmail) {
                        emailInput.value = savedEmail;
                    }
                }

                // Limpiar el almacenamiento
                sessionStorage.removeItem('login_error');
                sessionStorage.removeItem('login_email');
            }
        });

        // Interceptar el envío del formulario para guardar datos antes de enviar
        document.querySelector('form[action="login.php"]')?.addEventListener('submit', function(e) {
            const email = this.querySelector('input[name="email"]').value;
            sessionStorage.setItem('login_email', email);
        });
    </script>

</body>

</html>