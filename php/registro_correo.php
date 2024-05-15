<?php
include 'conexion_be.php';

// Verificar si se pasó un id_publicacion en la URL y si los datos del formulario se enviaron
if(isset($_GET['id_publicacion']) && isset($_POST['nombre_cliente']) && isset($_POST['correo_cliente']) && isset($_POST['descripcion_cliente']) && isset($_POST['direccion_cliente']) && isset($_POST['telefono_cliente'])) {
    $id_publicacion = $_GET['id_publicacion'];

    // Obtener los demás datos del formulario
    $nombre_cliente = $_POST['nombre_cliente'];
    $correo_cliente = $_POST['correo_cliente'];
    $descripcion_cliente = $_POST['descripcion_cliente'];
    $direccion_cliente = $_POST['direccion_cliente'];
    $telefono_cliente = $_POST['telefono_cliente'];

    // Preparar la consulta SQL para insertar la nueva solicitud
    $query = "INSERT INTO solicitudes (Id_publicaciones, nombre_cliente, correo_cliente, descripcion_cliente, direccion_cliente, telefono_cliente) 
              VALUES ('$id_publicacion', '$nombre_cliente', '$correo_cliente', '$descripcion_cliente', '$direccion_cliente', '$telefono_cliente')";

    // Ejecutar la consulta para insertar la nueva solicitud
    $ejecutar = mysqli_query($conexion, $query);          

    // Verificar si la inserción fue exitosa
    if($ejecutar){
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
    // Manejar el caso en el que no se proporciona id_publicacion en la URL o no se envían los datos del formulario
    echo "Error: No se proporcionó un id de publicación o no se enviaron todos los datos del formulario.";
    exit();
}
?>
