<?php
include '../php/conexion_be.php';
session_start();

// Verificar si el usuario ha iniciado sesión
$loggedIn = isset($_SESSION['usuario_correo']) || isset($_SESSION['correo']);

// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
if (!$loggedIn) {
    echo '
        <script>
            alert("Por favor debes iniciar sesión");
            window.location = "index.php";
        </script>
    ';
    session_destroy();
    die();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="../css/reset.min.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/header-14.css" />
    <link rel="stylesheet" href="status.css">
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Obtener el estado de inicio de sesión del servidor
            const loggedIn = <?php echo json_encode($loggedIn); ?>;

            if (loggedIn) {
                document.getElementById('auth-links').innerHTML = `
                    <a href="../php/cerrar_sesion.php" class="button">Cerrar sesión</a>
                `;
            }
        });
    </script>
    <title>Progreso de solicitud</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        .row {
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <!-- Header Start -->
    <header class="site-header">
        <div class="site-header__top">
            <div class="wrapper site-header__wrapper">
                <div class="site-header__start">
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="site-header__middle">
                    <div class="logo">
                        <img src="../img/MasterServicesLogo.png" alt="Logo" class="logo-img">
                    </div>
                    <a href="../home.php" class="brand">MasterServices</a>
                </div>
                <div class="site-header__end top" id="auth-links">
                    <a href="../index.php">Acceder</a>
                    <a href="../index.php" class="button">Registrar</a>
                </div>
            </div>
        </div>
        <div class="site-header__bottom">
            <div class="wrapper site-header__wrapper">
                <div class="site-header__start">
                    <nav class="nav">
                        <button class="nav__toggle" aria-expanded="false" type="button">
                            menu
                        </button>
                        <ul class="nav__wrapper">
                            <li class="nav__item"><a href="../home.php">Inicio</a></li>
                            <li class="nav__item"><a href="#">Nosotros</a></li>
                            <li class="nav__item"><a href="../php/lista.php">Lista de servicios</a></li>
                            <li class="nav__item"><a href="../php/solicitudes.php">Solicitudes</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div> <!--Progress-->
        <h1>Barra de Progreso</h1>
        <br>
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
                <h2 style="color: black;">Notificaciones del servicio</h2>
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
    <br>
    <footer>
        <div class="container__footer">
            <p>Todos los derechos reservados © 2024 <b>MasterServices</b></p>
        </div>
    </footer>
</body>
</html>
