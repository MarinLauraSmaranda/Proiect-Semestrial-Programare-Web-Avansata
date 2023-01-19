<?php
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

function validateInput($data) {
    $errors = [];
    if (strlen($data['username']) < 4) {
        $errors['username'] = 'Username must be at least 4 characters long';
    }
    if (strlen($data['password']) < 8) {
        $errors['password'] = 'Password must be at least 8 characters long';
    }
    return $errors;
}

function startSecureSession() {
    session_start();
    if (!isset($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
}

function logout() {
    session_destroy();
    header('Location: login.php');
    exit;
}
