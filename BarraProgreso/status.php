<?php
include '../php/conexion_be.php';
session_start();

// Verificar si el usuario ha iniciado sesión como servidor o cliente
if (!isset($_SESSION['usuario_id']) && !isset($_SESSION['id_cliente'])) {
    header("Location: ../index.php"); // Redirigir si no hay sesión iniciada
    exit();
}

$id_solicitud = $_GET['id_solicitud'];

// Obtener los datos actuales de la solicitud
$query = "SELECT * FROM solicitudes WHERE id = $id_solicitud";
$result = mysqli_query($conexion, $query);
$solicitud = mysqli_fetch_assoc($result);

if (!$solicitud) {
    echo 'Solicitud no encontrada.';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery-3.6.0.min.js"></script>
    <title>Progress Bar</title>
</head>
<body>
    <div> <!--Progress-->
        <h1>Barra de Progreso</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-15"> <!--longitud de la barra-->
                    <h2></h2>
                    <div class="progress-outer">
                        <div class="progress" id="progress-bar">
                            <div class="progress-bar progress-bar-danger progress-bar-striped active" style="width:<?= $solicitud['progreso'] ?>%; box-shadow:-1px 10px 10px rgba(91, 192, 222, 0.7);"></div>
                            <div class="progress-value"><?= $solicitud['progreso'] ?>%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Texto del Servidor</h2>
                <textarea class="form-control" rows="5" id="texto-servidor" <?php if (!isset($_SESSION['usuario_id'])) { echo 'readonly'; } ?>><?= htmlspecialchars($solicitud['mensaje']) ?></textarea>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['usuario_id'])) { ?>
    <div class="text-center">
        <button class="comic-button" onclick="actualizarBarra()">Actualizar</button>
    </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function actualizarBarra() {
            var nuevoProgreso = prompt("Introduce el nuevo progreso (0-100):");
            var mensaje = document.getElementById("texto-servidor").value;

            if (nuevoProgreso !== null && nuevoProgreso >= 0 && nuevoProgreso <= 100) {
                // Enviar la solicitud para actualizar el progreso
                $.post('actualizar_progreso.php', {
                    id_solicitud: <?= $id_solicitud ?>,
                    progreso: nuevoProgreso,
                    mensaje: mensaje
                }, function(response) {
                    alert(response);
                    location.reload(); // Recargar la página para ver los cambios
                });
            } else {
                alert("Introduce un valor válido entre 0 y 100.");
            }
        }
    </script>
</body>
</html>
