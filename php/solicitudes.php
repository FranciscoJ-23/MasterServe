<?php
include 'conexion_be.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php"); // Redirigir si no hay sesión iniciada
    exit();
}

$id_usuario = $_SESSION['usuario_id'];

// Consulta SQL para seleccionar las solicitudes del servidor logueado
$query = "
    SELECT s.*, p.titulo
    FROM solicitudes s
    INNER JOIN publicaciones p ON s.Id_publicaciones = p.Id
    WHERE p.id_nombre_completo = $id_usuario
";

$resultado = mysqli_query($conexion, $query);

// Verificar si el servidor tiene alguna solicitud
$tieneSolicitudes = mysqli_num_rows($resultado) > 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h1 class="text-center">Solicitudes de Servicios</h1>
    
    <?php if($tieneSolicitudes) { ?>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        // Iterar sobre cada solicitud y mostrarla en una tarjeta
        while($solicitud = mysqli_fetch_assoc($resultado)) {
        ?>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $solicitud['nombre_cliente'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $solicitud['correo_cliente'] ?></h6>
                    <p class="card-text"><?= $solicitud['descripcion_cliente'] ?></p>
                    <p class="card-text"><strong>Dirección:</strong> <?= $solicitud['direccion_cliente'] ?></p>
                    <p class="card-text"><strong>Teléfono:</strong> <?= $solicitud['telefono_cliente'] ?></p>
                    <p class="card-text"><strong>Servicio solicitado:</strong> <?= $solicitud['titulo'] ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } else { ?>
    <div class="text-center">
        <p>No tienes solicitudes en este momento.</p>
    </div>
    <?php } ?>
</div>

</body>
</html>

<?php
mysqli_close($conexion);
?>
