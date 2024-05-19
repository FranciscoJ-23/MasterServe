<?php
include 'conexion_be.php';
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

$solicitudes = [];
$tieneSolicitudes = false;

// Consulta SQL para seleccionar las solicitudes del servidor logueado
if (isset($_SESSION['usuario_id'])) {
    $id_usuario = $_SESSION['usuario_id'];

    $query = "
        SELECT s.*, p.titulo
        FROM solicitudes s
        INNER JOIN publicaciones p ON s.Id_publicaciones = p.Id
        WHERE p.id_nombre_completo = $id_usuario
    ";

    $resultado = mysqli_query($conexion, $query);
    $tieneSolicitudes = mysqli_num_rows($resultado) > 0;

    if ($tieneSolicitudes) {
        while ($solicitud = mysqli_fetch_assoc($resultado)) {
            $solicitudes[] = $solicitud;
        }
    }
}

// Consulta SQL para seleccionar las solicitudes del cliente logueado
if (isset($_SESSION['id_cliente'])) {
    $id_cliente = $_SESSION['id_cliente'];

    $query = "
        SELECT s.*, p.titulo
        FROM solicitudes s
        INNER JOIN publicaciones p ON s.Id_publicaciones = p.Id
        WHERE s.id_cliente = $id_cliente
    ";

    $resultado = mysqli_query($conexion, $query);
    $tieneSolicitudes = mysqli_num_rows($resultado) > 0;

    if ($tieneSolicitudes) {
        while ($solicitud = mysqli_fetch_assoc($resultado)) {
            $solicitudes[] = $solicitud;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de Servicios</title>
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
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Obtener el estado de inicio de sesión del servidor
            const loggedIn = <?php echo json_encode($loggedIn); ?>;

            if (loggedIn) {
                document.getElementById('auth-links').innerHTML = `
                    <a href="php/cerrar_sesion.php" class="button">Cerrar sesión</a>
                `;
            }
        });
    </script>
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

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Obtener el estado de inicio de sesión del servidor
            const loggedIn = <?php echo json_encode($loggedIn); ?>;

            if (loggedIn) {
                document.getElementById('auth-links').innerHTML = `
                    <a href="php/cerrar_sesion.php" class="button">Cerrar sesión</a>
                `;
            }
        });
    </script>
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
                    <a href="index.php">Acceder</a>
                    <a href="index.php" class="button">Registrar</a>
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
                            <li class="nav__item"><a href="../nosotros.php">Nosotros</a></li>
                            <li class="nav__item"><a href="lista.php">Lista de servicios</a></li>
                            <li class="nav__item"><a href="solicitudes.php">Solicitudes</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <h1 class="text-center">Solicitudes de Servicios</h1>
        
        <?php if($tieneSolicitudes) { ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            // Iterar sobre cada solicitud y mostrarla en una tarjeta
            foreach($solicitudes as $solicitud) {
            ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($solicitud['nombre_cliente']) ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($solicitud['correo_cliente']) ?></h6>
                        <p class="card-text"><?= htmlspecialchars($solicitud['descripcion_cliente']) ?></p>
                        <p class="card-text"><strong>Dirección:</strong> <?= htmlspecialchars($solicitud['direccion_cliente']) ?></p>
                        <p class="card-text"><strong>Teléfono:</strong> <?= htmlspecialchars($solicitud['telefono_cliente']) ?></p>
                        <p class="card-text"><strong>Servicio solicitado:</strong> <?= htmlspecialchars($solicitud['titulo']) ?></p>
                    </div>
                    <a href="../BarraProgreso/status.php?id_solicitud=<?= $solicitud['Id'] ?>" class="btn btn-primary">Mostrar seguimiento</a>
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
    <footer>
        <div class="container__footer">
            <p>Todos los derechos reservados © 2024 <b>MasterServices</b></p>
        </div>
    </footer>
</body>

</html>

<?php
mysqli_close($conexion);
?>
