<?php
session_start(); // Iniciar sesión

// Verificar si la variable de sesión está establecida
if (!isset($_SESSION['id'])) {
    echo "Error: No se ha establecido el ID del cliente en la sesión.";
    exit();
}

$id_cliente = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Cliente ID</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <p>El ID del cliente es: <?php echo htmlspecialchars($id_cliente); ?></p>
</body>
</html>
