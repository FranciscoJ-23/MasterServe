<?php
include '../php/conexion_be.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    echo "Debes iniciar sesión como servidor.";
    exit();
}

if (isset($_POST['id_solicitud']) && isset($_POST['progreso']) && isset($_POST['mensaje'])) {
    $id_solicitud = $_POST['id_solicitud'];
    $progreso = $_POST['progreso'];
    $mensaje = $_POST['mensaje'];

    $query = "UPDATE solicitudes SET progreso = '$progreso', mensaje = '$mensaje' WHERE id = $id_solicitud";
    if (mysqli_query($conexion, $query)) {
        echo "Progreso actualizado exitosamente.";
    } else {
        echo "Error al actualizar el progreso: " . mysqli_error($conexion);
    }
} else {
    echo "Error: No se enviaron todos los datos necesarios.";
    exit();
}
?>
