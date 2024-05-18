<?php
include 'conexion_be.php';
session_start();

// Verificar si el cliente está autenticado y si se pasaron los datos correctos
if (isset($_SESSION['id_cliente']) && isset($_GET['id_publicacion']) && isset($_POST['nombre_cliente']) && isset($_POST['correo_cliente']) && isset($_POST['descripcion_cliente']) && isset($_POST['direccion_cliente']) && isset($_POST['telefono_cliente'])) {
    $id_cliente = $_SESSION['id_cliente']; // Obtener el id del cliente de la sesión
    $id_publicacion = $_GET['id_publicacion'];

    // Obtener los demás datos del formulario
    $nombre_cliente = $_POST['nombre_cliente'];
    $correo_cliente = $_POST['correo_cliente'];
    $descripcion_cliente = $_POST['descripcion_cliente'];
    $direccion_cliente = $_POST['direccion_cliente'];
    $telefono_cliente = $_POST['telefono_cliente'];

    // Preparar la consulta SQL para insertar la nueva solicitud
    $query = "INSERT INTO solicitudes (Id_publicaciones, id_cliente, nombre_cliente, correo_cliente, descripcion_cliente, direccion_cliente, telefono_cliente) 
              VALUES ('$id_publicacion', '$id_cliente', '$nombre_cliente', '$correo_cliente', '$descripcion_cliente', '$direccion_cliente', '$telefono_cliente')";

    // Ejecutar la consulta para insertar la nueva solicitud
    $ejecutar = mysqli_query($conexion, $query);

    // Verificar si la inserción fue exitosa
    if ($ejecutar) {
        echo '
            <script>
                alert("Solicitud enviada exitosamente");
                window.location = "lista.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Inténtalo de nuevo, solicitud no enviada");
                window.location = "lista.php";
            </script>
        ';
    }
} else {
    // Manejar el caso en el que no se proporciona id_publicacion en la URL o no se envían todos los datos del formulario
    echo "Error: No se proporcionó un id de publicación, no se envió el id del cliente, o no se enviaron todos los datos del formulario.";
    exit();
}
?>
