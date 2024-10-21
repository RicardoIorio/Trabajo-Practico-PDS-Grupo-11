
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
    <link rel="stylesheet" href="css/table.css">
</head>
<nav>Usuario</nav>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['username']; ?>!</h1>
    <?php if (is_admin()): ?>
        <?php
        if (!is_logged_in() || !is_admin()) {
        header('login.php');
        exit();
        }
        $stmt = $pdo->query("SELECT access_log.*, users.username FROM access_log JOIN users ON access_log.user_id = users.id ORDER BY timestamp DESC");
        $logs = $stmt->fetchAll();
        ?>
        <nav>
            Administrador
        </nav>
        <body>
    <h1>Log de Accesos</h1>
    <table>
        <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Acción</th>
            <th>Fecha y Hora</th>
        </tr>
        <?php foreach ($logs as $log): ?>
            <tr>
                <td><?php echo htmlspecialchars($log['id'])?></td>
                <td><?php echo htmlspecialchars($log['username']); ?></td>
                <td><?php echo htmlspecialchars($log['action']); ?></td>
                <td><?php echo htmlspecialchars($log['timestamp']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

    <?php endif; ?>
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>