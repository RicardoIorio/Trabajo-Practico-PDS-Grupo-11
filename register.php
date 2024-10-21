<?php
require_once 'auth.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize_input($_POST['username']);
    $email = sanitize_input($_POST['email']);
    $password = $_POST['password'];
    $profile = 'user'; // Por defecto, todos los nuevos registros son usuarios normales

    if (!validate_password($password)) {
        $error = "La contraseña debe tener al menos 8 caracteres, incluir mayúsculas, minúsculas, números y símbolos.";
    } else {
        if (register_user($username, $email, $password, $profile)) {
            header('Location: login.php');
            exit();
        } else {
            $error = "Error al registrar el usuario. Puede que el nombre de usuario o email ya existan.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Registro</h1>
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="" method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
</body>
</html>