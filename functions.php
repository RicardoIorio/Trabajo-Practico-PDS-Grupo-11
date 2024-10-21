<?php
#session_start(); // Iniciar la sesión

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validate_password($password) {
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $symbol    = preg_match('@[^\w]@', $password);

    return strlen($password) >= 8 && $uppercase && $lowercase && $number && $symbol;
}

function log_access($user_id, $action) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO access_log (user_id, action, timestamp) VALUES (?, ?, NOW())");
    $stmt->execute([$user_id, $action]);
}
?>
