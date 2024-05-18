<?php
session_start();
if (!isset($_SESSION['usuario_correo']) && !isset($_SESSION['correo'])) {
    echo '
        <script>
            alert("Por favor debes iniciar sesión");
            window.location = "index.php";
        </script>
    ';
    session_destroy();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bienvenida</title>
</head>

<body>
<h1>Bienvenido</h1>
    <div class="text-center">
        <h1>Sesion iniciada</h1>
        <a href="php/cerrar_sesion.php">Cerrar sesión</a>
        <br>
        <a href="php/lista.php">Ir a lista</a>
        <br>
        <a href="php/solicitudes.php">Solicitudes</a>
        <br>
        <a href="calendario.php">Mi calendario</a>
    </div>
</body>

</html>
