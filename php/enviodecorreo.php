<?php
// Verificar si se pasó un id_publicacion en la URL
if (isset($_GET['id_publicacion'])) {
    $id_publicacion = $_GET['id_publicacion'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Envia tu solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="bg-black p-2 text-white text-center">Envia la solicitud al trabajador</h1>
    <br>
    <div class="container">

        <form action="registro_correo.php?id_publicacion=<?= $id_publicacion ?>" class="mb-3" method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre completo</label>
                <input type="text" class="form-control" name="nombre_cliente">
            </div>
            <div class="mb-3">
                <label class="form-label">Ingresa tu correo electronico</label>
                <input type="email" class="form-control" name="correo_cliente">
            </div>
            <div class="mb-3">
                <label class="form-label">Describe el servicio que requieres</label>
                <textarea class="form-control" name="descripcion_cliente" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Ingresa tu dirección</label>
                <textarea class="form-control" name="direccion_cliente" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Ingresa tu numero de telefono</label>
                <input type="number" class="form-control" name="telefono_cliente">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="btnregistrar">Enviar</button>
            <a href="lista.php" class="btn btn-danger">Cancelar</a>
        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>