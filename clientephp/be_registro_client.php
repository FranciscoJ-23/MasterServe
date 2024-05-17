<?php
    include '../php/conexion_be.php';

    $cliente_nombre = $_POST['cliente_nombre'];
    $cliente_correo = $_POST['cliente_correo'];
    $cliente_password = $_POST['cliente_password'];

    $query = "INSERT INTO clientes(cliente_nombre, cliente_correo, cliente_password) 
              VALUES('$cliente_nombre', '$cliente_correo', '$cliente_password')";
    
    //verificar que el correo no se repita en mysql
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM clientes WHERE cliente_correo='$cliente_correo' ");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta en uso");
                window.location = "cliente_login.php";
            </script>
        ';
        exit(); //termina el script y ya no se ejcutar el codigo de registro
    }
  
    $ejecutar = mysqli_query($conexion, $query);          
    if($ejecutar){
        echo '
            <script>
                alert("Cuenta alamencenado exitosamente")
                window.location = "cliente_login.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Intentalo de nuevo, Usuario no almacenado")
                window.location = "cliente_login.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>