<?php
session_start();
require_once 'configdatabase.php';
require_once 'functions.php';

function register_user($username, $email, $password, $profile) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    
    if ($stmt->rowCount() > 0) {
        return false; // Usuario ya existe
    }
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hashea la contraseña
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, profile) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$username, $email, $hashed_password, $profile]);
}

// funcion de login
function login_user($username, $password) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['profile'] = $user['profile'];
        log_access($user['id'], 'login');
        return true;
    }
    
    return false;
}

// Detecta si el usuario esta loggeado
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Detecta si el usuario es administrador
function is_admin() {
    return isset($_SESSION['profile']) && $_SESSION['profile'] == 'admin';
}

// Funcion para manejar las sesiones de usuario
function logout_user() {
    log_access($_SESSION['user_id'], 'logout');
    session_unset();
    session_destroy();
}
?>
