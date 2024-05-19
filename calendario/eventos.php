<?php
header('Content-Type: application/json');
$pdo = new PDO("mysql:dbname=login_register_db;host=127.0.0.1", "root", "");

$accion= (isset($_GET['accion']))?$_GET['accion']:'leer';
switch ($accion) {
    case 'agregar':
        $sentenciaSQL = $pdo->prepare("INSERT INTO eventocalendario(title,descripcion,color,textColor,start,end)VALUES(:title,:descripcion,:color,:textColor,:start,:end)");
        
        $respuesta=$sentenciaSQL->execute(array(
            "title" =>$_POST['title'],
            "descripcion" =>$_POST['descripcion'],
            "color" =>$_POST['color'],
            "textColor" =>$_POST['textColor'],
            "start" =>$_POST['start'],
            "end" =>$_POST['end']

        ));
        echo json_encode($respuesta);
        break;
    case 'eliminar':

        //echo "Instrucción eliminar";
        $respuesta=false;

        if(isset($_POST['Id'])){

            $sentenciaSQL= $pdo->prepare("DELETE FROM eventocalendario WHERE Id=:Id");
            $respuesta = $sentenciaSQL->execute(array("Id"=>$_POST['Id']));
        }
        echo json_encode($respuesta);

        break;
    case 'modificar':

        //echo "Instrucción modificar";
        $sentenciaSQL = $pdo->prepare("UPDATE eventocalendario SET title=:title, descripcion=:descripcion, color=:color, textColor=:textColor, start=:start, end=:end WHERE Id=:Id");
        //sentencia para actualizar los datos de la tabla

        $respuesta=$sentenciaSQL->execute(array(
            "Id" =>$_POST['Id'],
            "title" =>$_POST['title'],
            "descripcion" =>$_POST['descripcion'],
            "color" =>$_POST['color'],
            "textColor" =>$_POST['textColor'],
            "start" =>$_POST['start'],
            "end" =>$_POST['end']

        ));
        echo json_encode($respuesta);
        break;
    default:
        // Seleccionar los eventos del calendario
        $sentenciaSQL = $pdo->prepare("SELECT * FROM eventocalendario");
        $sentenciaSQL->execute();

        // Obtener los eventos de la base de datos
        $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        //echo '['.json_encode($resultado).']';
        echo json_encode($resultado);
}
?> 