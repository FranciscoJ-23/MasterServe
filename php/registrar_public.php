<?php
// Verificar la sesión del usuario
include 'conexion_be.php';
session_start();
if (!isset($_SESSION['usuario_correo'])) {
    header("Location: ../index.php"); // Redirigir si no hay sesión iniciada
    exit();
}

// Obtener el ID del usuario actual
$id_usuario = $_SESSION['usuario_id'];

// Obtener el nombre del usuario basado en su ID
$consulta_usuario = "SELECT nombre_completo FROM usuarios WHERE id = $id_usuario";
$resultado_usuario = mysqli_query($conexion, $consulta_usuario);

if ($fila_usuario = mysqli_fetch_assoc($resultado_usuario)) {
    $nombre_usuario = $fila_usuario['nombre_completo'];
} else {
    // Manejar el caso si no se encuentra el usuario
    echo "Error: No se encontró el usuario.";
    exit();
}

// Procesar el formulario cuando se envíe
if (isset($_POST['btnregistrar'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $telefono = $_POST['telefono'];

    // Insertar los datos en la tabla de publicaciones
    $insertar_publicacion = "INSERT INTO publicaciones (id_nombre_completo, titulo, descripcion, telefono) VALUES ('$id_usuario', '$titulo', '$descripcion', '$telefono')";

    // verificar si se creo correctamente la publicación 
    if (mysqli_query($conexion, $insertar_publicacion)) {
        // Obtener el ID de la publicación recién insertada
        $id_publicacion = mysqli_insert_id($conexion);

        echo '
        <script>
            alert("Publicación creada exitosamente");
            window.location = "lista.php";
        </script>
    ';
    } else {
        echo "Error al insertar la publicación: " . mysqli_error($conexion);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crea tu publicación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="bg-black p-2 text-white text-center">Crea tu publicación</h1>
    <br>
    <div class="container">

        <form class="mb-3" method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre de tu servicio</label>
                <input type="text" class="form-control" name="titulo">
            </div>
            <div class="mb-3">
                <label class="form-label">Describe tus servicios</label>
                <textarea class="form-control" name="descripcion" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Ingresa tu numero de telefono</label>
                <input type="numb" class="form-control" name="telefono">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="btnregistrar">Publicar</button>
            <a href="lista.php" class="btn btn-dark">Regresar</a>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>