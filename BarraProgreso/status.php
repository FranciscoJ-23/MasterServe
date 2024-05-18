<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="status.css">
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
                            <div class="progress-bar progress-bar-danger progress-bar-striped active" style="width:80%; box-shadow:-1px 10px 10px rgba(91, 192, 222, 0.7);"></div>
                            <div class="progress-value">80%</div>
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
                <textarea class="form-control" rows="5" id="texto-servidor"></textarea>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button class="comic-button" onclick="actualizarBarra()">Actualizar</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        function actualizarBarra() {
            // Genera un nuevo valor de progreso aleatorio (para este ejemplo)
            var nuevoProgreso = Math.floor(Math.random() * 101); // Genera un número entre 0 y 100
            
            // Actualiza el ancho de la barra de progreso
            var progressBar = document.getElementById("progress-bar");
            var progressBarInner = progressBar.querySelector(".progress-bar");
            progressBarInner.style.width = nuevoProgreso + "%";
            
            // Actualiza el texto que muestra el progreso
            var progressValue = progressBar.querySelector(".progress-value");
            progressValue.innerText = nuevoProgreso + "%";

            // Actualiza el texto del servidor (para este ejemplo, se genera un texto aleatorio)
            var textoServidor = document.getElementById("texto-servidor");
            textoServidor.value = "Este es el texto del servidor para la actualización " + nuevoProgreso;
        }
    </script>
</body>
</html>
