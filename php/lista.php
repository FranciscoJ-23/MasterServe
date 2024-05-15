<?php
include  "conexion_be.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de servicios</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
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
    <div class="container">
        <h1 class="text-center">Lista de servicios</h1>
        <?php
        $sql = "SELECT p.*, u.nombre_completo AS nombre_usuario 
                FROM publicaciones p 
                INNER JOIN usuarios u ON p.id_nombre_completo = u.id";
        $resultado = $conexion->query($sql);
        while ($datos = $resultado->fetch_object()) { ?>
            <div class="service-container">
                <div class="service-details">
                    <h2><?= $datos->titulo ?></h2>
                    <p><?= $datos->descripcion ?></p>
                    <p><?= $datos->nombre_usuario ?></p>
                    <p><?= $datos->telefono ?></p>
                </div>
                <div class="service-actions">
                    <a href="enviodecorreo.php?id_publicacion=<?= $datos->Id ?>">
                        <button>Solicitar</button>
                    </a>
                </div>

            </div>
        <?php }
        ?>
        <?php
        // Verificar si el usuario ha iniciado sesión y así mostrar el botón de creación 
        session_start();
        if (isset($_SESSION['usuario_correo'])) {
            // Mostrar el botón solo si el usuario ha iniciado sesión
            echo '<button onclick="window.location.href=\'registrar_public.php\'">';
            echo '<span>';
            echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg> Crear';
            echo '</span>';
            echo '</button>';
        }
        ?>
    </div>
</body>

</html>