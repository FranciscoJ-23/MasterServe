<?php
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>MasterServices</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <link rel="stylesheet" href="css/reset.min.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/header-14.css" />
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
                        <img src="img/MasterServicesLogo.png" alt="Logo" class="logo-img">
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
                            <li class="nav__item"><a href="home.php">Inicio</a></li>
                            <li class="nav__item"><a href="#">Nosotros</a></li>
                            <li class="nav__item"><a href="php/lista.php">Lista de servicios</a></li>
                            <li class="nav__item"><a href="php/solicitudes.php">Solicitudes</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Inicio del contenido-->
    <div class="container">
        <div class="row books-row">

            <div class="col-4 books-col">
                <div class="card">
                    <a href="plomeria.html" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></a>

                    <img class="card-img-top mx-auto d-block" src="img/Plomeria.png" alt="Card image cap">
                    <div class="card-body">

                        <div class="card-title">
                            <h5>Plomeria</h5>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-4 books-col">
                <div class="card">
                    <a href="#" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></a>

                    <img class="card-img-top mx-auto d-block" src="img/limpieza.jpg" alt="Card image cap">
                    <div class="card-body">

                        <div class="card-title">
                            <h5>Limpieza</h5>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-4 books-col">
                <div class="card">
                    <a href="#" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></a>

                    <img class="card-img-top mx-auto d-block" src="img/remodelacion.jpg" alt="Card image cap">
                    <div class="card-body">

                        <div class="card-title">
                            <h5>Remodelacion</h5>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-4 books-col">
                <div class="card">
                    <a href="#" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></a>
                    <img class="card-img-top mx-auto d-block" src="img/otros.png" alt="Card image cap">
                    <div class="card-body">

                        <div class="card-title">
                            <h5>Carpinteria</h5>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-4 books-col">
                <div class="card">
                    <a href="#" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></a>
                    <img class="card-img-top mx-auto d-block" src="img/otros.png" alt="Card image cap">
                    <div class="card-body">

                        <div class="card-title">
                            <h5>Elctricidad</h5>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-4 books-col">
                <div class="card">
                    <a href="#" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></a>
                    <img class="card-img-top mx-auto d-block" src="img/otros.png" alt="Card image cap">
                    <div class="card-body">

                        <div class="card-title">
                            <h5>Instalaciones</h5>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-4 books-col">
                <div class="card">
                    <a href="#" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></a>
                    <img class="card-img-top mx-auto d-block" src="img/otros.png" alt="Card image cap">
                    <div class="card-body">

                        <div class="card-title">
                            <h5>Otros</h5>

                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/header-14.js"></script>
    <footer>
        <div class="container__footer">
            <p>Todos los derechos reservados © 2024 <b>MasterServices</b></p>
        </div>
    </footer>
</body>

</html>