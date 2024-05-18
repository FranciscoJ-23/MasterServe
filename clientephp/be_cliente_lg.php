<?php
session_start(); // Para empezar a trabajar con sesiones
include '../php/conexion_be.php';

$cliente_correo = trim($_POST['cliente_correo']); // Uso de trim para eliminar espacios en blanco
$cliente_password = $_POST['cliente_password'];

$consulta = "SELECT id, cliente_correo FROM clientes WHERE cliente_correo = '$cliente_correo' AND cliente_password = '$cliente_password'";
$validar_login = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($validar_login) > 0) {
    $datos_cliente = mysqli_fetch_assoc($validar_login);

    //echo "ID del usuario desde la base de datos: " . $datos_usuario['id']; // Depuración
    $_SESSION['id_cliente'] = $datos_cliente['id'];
    $_SESSION['correo'] = $datos_cliente['cliente_correo'];
    //echo "ID del Cliente: " . $_SESSION['id']; // Depuración para ver si se guarda correctamente el id
    header("location: home_cliente.php");
    exit(); // Esto detendrá el script aquí para que puedas ver el echo antes de redirigir
   
} else {
    echo '
        <script>
            alert("Cuenta no existe");
            window.location = "cliente_login.php";
        </script>
    ';
    exit();
}

