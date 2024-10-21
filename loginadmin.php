<?php
require_once 'auth.php';

if (!is_logged_in() || !is_admin()) {
    header('login.php');
    exit();
}

$stmt = $pdo->query("SELECT access_log.*, users.username FROM access_log JOIN users ON access_log.user_id = users.id ORDER BY timestamp DESC");
$logs = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log de Accesos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Log de Accesos</h1>
    <table>
        <tr>
            <th>Usuario</th>
            <th>Acción</th>
            <th>Fecha y Hora</th>
        </tr>
        <?php foreach ($logs as $log): ?>
            <tr>
                <td><?php echo htmlspecialchars($log['username']); ?></td>
                <td><?php echo htmlspecialchars($log['action']); ?></td>
                <td><?php echo htmlspecialchars($log['timestamp']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="../index.php">Volver al inicio</a></p>
</body>
</html>