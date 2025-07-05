<?php
session_start();

// Configuración de usuarios (en producción usa password_hash())
$USERS = [
    'douglas96@gmail.com' => 'Supersecreta96!!',
    'desarrolloweb@icloud.com' => 'futuroweb123*'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Verificación simple (en producción usa password_verify)
    if (isset($USERS[$email]) && $USERS[$email] === $password) {
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $email;
        header('Location: account.php');
        exit;
    } else {
        // Guarda el error en sesión
        $_SESSION['login_error'] = 'Credenciales inválidas';
        // Redirige de vuelta al formulario
        header('Location: myaccount.html');
        exit;
    }
}

// Si alguien accede directamente a login.php sin enviar datos
header('Location: myaccount.html');
exit;
