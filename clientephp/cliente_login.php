<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión </title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="body-container">
    <div class="login-container">
        <!--Formulario de incio de sesion-->
        <form action="be_cliente_lg.php" method="POST" id="loginForm">
            <h1 class="titulo-container">Inicia Sesión</h1>
            <input type="email" class="inputs" placeholder="Correo" name="cliente_correo">
            <input type="password" class="inputs" placeholder="Contraseña" name="cliente_password" required>
            <div>
                <span class="sub">¿No tienes una cuenta? <a href="#" onclick="toggleForms()">Registrar</a></span>
            </div>
            <br>
            <button class="login-btn">Iniciar sesión</button>
        </form>

        <!--Formulario de registro-->
        <div class="form-container">
            <form action="be_registro_client.php" method="POST" id="registerForm" class="hidden">
                <h1>Registrate</h1>
                <input type="text" class="inputs" id="full_name" placeholder="Nombre completo" name="cliente_nombre">
                <input type="mail" class="inputs" id="correo" placeholder="Correo Electronico" name="cliente_correo">
                <input type="password" class="inputs" id="passwordR" placeholder="Contraseña" name="cliente_password">
                <div>
                    <span class="sub">¿Ya tienes una cuenta de cliente? <a href="#" onclick="toggleForms()">Inicia sesión</a></span>
                </div>
                <div>
                    <span class="sub">Inicia sesión como trabajador <a href="../index.php">Inicia sesión</a></span>
                </div>
                <br>
                <button class="login-btn">Registrar</button>
            </form>
        </div>
    </div>

    <script src="../script.js"></script>
</body>

</html>