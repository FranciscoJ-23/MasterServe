<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión </title>
    <link rel="stylesheet" href="../css/cliente.css">
</head>

<body class="body-container">
    <!--Formulario de registro-->
    <div class="form-container">
        <form action="be_registro_client.php" method="POST" id="registerForm">
            <span class="title">Registro para clientes</span>
            <br>
            <span class="sub mb">Registrate para empezar a solcitar a servicios</span>
            

            <input type="text" class="input" placeholder="Nombre completo" name="cliente_nombre">
            <input type="email" class="input" placeholder="Correo" name="cliente_correo">
            <input type="password" class="input" placeholder="Contraseña" name="cliente_password">
            <div>
                <span class="sub">¿Ya tienes una cuenta de cliente? <a href="#" onclick="toggleForms()">Inicia sesión</a></span>
            </div>
            <div>
                <span class="sub">Inicia sesión como trabajador <a href="../index.php">Inicia sesión</a></span>
            </div>

            <button class="login-btn">Registrar</button>
        </form>

        <!--Formulario de incio de sesion-->
        <form action="be_cliente_lg.php" method="POST" class="hidden" id="loginForm">
            <span class="title">Inicia sesión</span>
            <br>
            <span class="sub mb">Inicia sesión para acceder a la lista de servicios</span>
            

            <input type="email" class="input" placeholder="Correo" name="cliente_correo">
            <input type="password" class="input" placeholder="Contraseña" name="cliente_password">
            <div>
                <span class="sub">¿No tienes una cuenta? <a href="#" onclick="toggleForms()">Registrar</a></span>
            </div>
            <button class="login-btn">Iniciar sesión</button>
        </form>
    </div>

    <script src="cliente.js"></script>
</body>

</html>