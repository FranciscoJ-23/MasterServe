<?php
include "conexion_be.php";
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
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de servicios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <link rel="stylesheet" href="../css/reset.min.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/header-14.css" />
    <link rel="stylesheet" href="../styles.css">
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
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            flex: 1;
        }

        .button-right {
            text-align: right;
            margin-bottom: 20px;
        }

        .text-center {
            text-align: center;
        }

        .service-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background-color: #4A5568;
            border-radius: 8px;
            padding: 20px;
            transition: background-color 0.3s, transform 0.5s;
        }

        .service-container:hover {
            background-color: #2D3748;
            transform: scale(1.05);
        }

        .service-details {
            flex: 1;
        }

        .service-details h2 {
            color: #FFFFFF;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .service-details p {
            color: #FFFFFF;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        .service-actions button {
            width: 100px;
            height: 40px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            background-color: #667EEA;
            color: #FFFFFF;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.5s;
        }

        .service-actions button:hover {
            background-color: #4C51BF;
            transform: scale(1.05);
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
                    <a href="home.php" class="brand">MasterServices</a>
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
                            <li class="nav__item"><a href="#">Nosotros</a></li>
                            <li class="nav__item"><a href="lista.php">Lista de servicios</a></li>
                            <li class="nav__item"><a href="solicitudes.php">Solicitudes</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <h1 class="text-center">Lista de servicios</h1>
        <div class="button-right">
            <?php
            // Mostrar el botón de creación si el usuario ha iniciado sesión como servidor
            if (isset($_SESSION['usuario_correo'])) {
                echo '<button onclick="window.location.href=\'registrar_public.php\'">';
                echo '<span>';
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg> Crear';
                echo '</span>';
                echo '</button>';
            }
            ?>
        </div>
        <div class="search-form">
            <form action="lista.php" method="GET">
                <input type="text" name="keyword" placeholder="Buscar por palabra clave">
                <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15.7 13.3l-3.81-3.83A5.93 5.93 0 0 0 13 6c0-3.31-2.69-6-6-6S1 2.69 1 6s2.69 6 6 6c1.3 0 2.48-.41 3.47-1.11l3.83 3.81c.19.2.45.3.7.3.25 0 .52-.09.7-.3a.996.996 0 0 0 0-1.41v.01zM7 10.7c-2.59 0-4.7-2.11-4.7-4.7 0-2.59 2.11-4.7 4.7-4.7 2.59 0 4.7 2.11 4.7 4.7 0 2.59-2.11 4.7-4.7 4.7z"/></svg>
                </button>
            </form>
        </div>
        <?php
        // Obtener la palabra clave de la URL si está presente
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

        // Construir la consulta SQL basada en la palabra clave
        $sql = "SELECT p.*, u.nombre_completo AS nombre_usuario 
                FROM publicaciones p 
                INNER JOIN usuarios u ON p.id_nombre_completo = u.id";

        if (!empty($keyword)) {
            // Agregar condición WHERE para filtrar por palabra clave
            $sql .= " WHERE titulo LIKE '%$keyword%' OR descripcion LIKE '%$keyword%'";
        }

        $resultado = $conexion->query($sql);
        while ($datos = $resultado->fetch_object()) { ?>
            <div class="service-container">
                <div class="service-details">
                    <h2><?= htmlspecialchars($datos->titulo) ?></h2>
                    <p><?= htmlspecialchars($datos->descripcion) ?></p>
                    <p><?= htmlspecialchars($datos->nombre_usuario) ?></p>
                    <p><?= htmlspecialchars($datos->telefono) ?></p>
                </div>
                <div class="service-actions">
                    <?php
                    // Ocultar el botón de solicitar si el usuario ha iniciado sesión como servidor
                    if (!isset($_SESSION['usuario_correo'])) {
                        echo '<a href="enviodecorreo.php?id_publicacion=' . htmlspecialchars($datos->Id) . '">';
                        echo '<button>Solicitar</button>';
                        echo '</a>';
                    }
                    ?>
                </div>
            </div>
        <?php }
        ?>
    </div>
    <footer>
        <div class="container__footer">
            <p>Todos los derechos reservados © 2024 <b>MasterServices</b></p>
        </div>
    </footer>
</body>

</html>
