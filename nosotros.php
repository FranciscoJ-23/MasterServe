<!DOCTYPE html>
<html>

<head>
    <title>E-commerce website homepage</title>
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
                            <li class="nav__item"><a href="nosotros.php">Nosotros</a></li>
                            <li class="nav__item"><a href="php/lista.php">Lista de servicios</a></li>
                            <li class="nav__item"><a href="php/solicitudes.php">Solicitudes</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="containerEx">
        <div class="container">
            <div class="section">
                <h2>Nuestra Misión</h2>
                <p>En MasterServices, nuestra misión es conectar profesionales de todo el mundo para ayudarles a ser más
                    productivos y exitosos. Creemos en el poder de las redes profesionales y en el impacto positivo que
                    pueden tener en la carrera de una persona. A través de nuestra plataforma, buscamos facilitar la
                    creación de relaciones valiosas y el intercambio de conocimientos entre individuos de diversas
                    industrias y profesiones.</p>
            </div>

            <div class="section">
                <h2>Nuestros Valores</h2>
                <p>- <strong>Conexión</strong>: Valoramos la creación de conexiones significativas y auténticas que
                    puedan transformar carreras y vidas.<br>
                    - <strong>Innovación</strong>: Estamos constantemente buscando nuevas formas de mejorar nuestra
                    plataforma y ofrecer más valor a nuestros usuarios.<br>
                    - <strong>Inclusión</strong>: Nos esforzamos por construir una comunidad diversa e inclusiva donde
                    todos los profesionales se sientan bienvenidos y valorados.<br>
                    - <strong>Integridad</strong>: Actuamos con transparencia y ética en todas nuestras operaciones y en
                    nuestras interacciones con los usuarios.</p>
            </div>


        </div>
    </div>

    <script src="js/header-14.js"></script>
    
</body>
</html>