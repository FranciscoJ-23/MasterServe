<?php
session_start();

if (isset($_SESSION['usuario_correo'])) {
    header("location: home.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="body-container">
    <div class="login-container">
        <!--Formulario de inicio de sesion-->
        <form action="php/login_usuario_be.php" method="POST" id="loginForm">
            <h1 class="titulo-container">Inicia Sesión</h1>
            <input type="email" class="inputs" id="email" placeholder="Correo Electronico" name="correo" autocomplete="off">
            <input type="password" class="inputs" id="password" placeholder="contraseña" name="contrasena" required>
            <div class="checkbox-container">
                <input type="checkbox" id="remember">
                <label for="remember" class="checkbox-label">Recordar</label>
            </div>
            <div class="forgot-password">
                <a href="clientephp/cliente_login.php">Inicia sesión como cliente</a>
            </div>
            <button type="submit" class="login-btn" id="loginButton">Iniciar Sesión</button>
            <div class="register-text">
                ¿No tienes cuenta? <a href="#" onclick="toggleForms()">Regístrate</a>
            </div>
        </form>

        <!--Formulario de registro-->

        <form action="php/registro_usuario_be.php" method="POST" id="registerForm" class="hidden"> <!--hay que agregar action y method post para que funcione el envio de datos!-->
            <h1>Registrate</h1>
            <input type="text" class="inputs" id="full_name" placeholder="Nombre" name="nombre_completo" required autocomplete="off">
            <input type="mail" class="inputs" id="emailR" placeholder="Correo Electronico" name="correo" autocomplete="off">
            <input type="text" class="inputs" id="usuarioR" placeholder="Nombre de usuario" name="usuario" required>
            <input type="password" class="inputs" id="passwordR" placeholder="Contraseña" name="contrasena" required>
            <button type="submit" class="login-btn" id="registerButton">Registrar</button>
            <div class="register-text">
                ¿Ya tienes cuenta? <a href="#" onclick="toggleForms()">Iniciar Sesión</a>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>