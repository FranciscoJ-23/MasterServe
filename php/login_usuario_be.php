<?php
session_start(); // Para empezar a trabajar con sesiones
include 'conexion_be.php';

$correo = trim($_POST['correo']); // Uso de trim para eliminar espacios en blanco
$contrasena = $_POST['contrasena'];

$consulta = "SELECT id, correo FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
$validar_login = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($validar_login) > 0) {
    // Obtener datos del usuario
    $datos_usuario = mysqli_fetch_assoc($validar_login);

    // Guardar ID de usuario en la sesión
    $_SESSION['usuario_id'] = $datos_usuario['id'];
    $_SESSION['usuario_correo'] = $datos_usuario['correo'];
    

    header("location: ../home.php");
    exit;
} else {
    echo '
            <script>
                alert("Usuario no existe")
                window.location = "../index.php" 
            </script>
        ';
    exit;
}
