
<?php
require_once 'auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['username']; ?>!</h1>
    <?php if (is_admin()): ?>
        <p><a href="loginadmin.php">Ver log de accesos</a></p>
    <?php endif; ?>
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>