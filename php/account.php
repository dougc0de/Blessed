<?php
session_start();               // 1️⃣ necesitamos leer $_SESSION

if (empty($_SESSION['logged'])) {
    header('Location: login.php');   // 2️⃣ no hay login → fuera
    exit;
}

$user = $_SESSION['user'];     // 3️⃣ nombre del usuario autenticado
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
</body>

</html>