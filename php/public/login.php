<?php
session_start();
require_once __DIR__ . '/../src/auth.php';   // sube un nivel a /src

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email      = trim($_POST['email']      ?? '');
    $passwore   = trim($_POST['password']   ?? '');

    if (isset($USERS[$email]) && $USERS[$email] === $password) {
        $_SESSION['logged']    = true;
        $_SESSION['user_email'] = $email;

        header('location: /php/public/account.php');
        exit;
    }

    header('Location: /myaccount.html?error=1');
    exit;
}
header('Location: /myaccount.html');
exit;
