<?php

	include("conexion.php");

    $accionSQL = "";
    $sentenciaSQL = "";
    $msgExito = "";
    $msgError = "";

    if(isset($_POST['guardar'])){
        if(isset($_POST['id']) && $_POST['id'] != ""){
            $accionSQL = "modificar";
            $id = $_POST['id'];
        }else{
            $accionSQL = "alta";
        }
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $genero = $_POST['genero'];
        $imagen = ""/*$_POST['imagen']*/;
    }else{
        $accionSQL = "eliminar";
        $id = $_POST['id'];
    }

	/* sentecia sql */
    switch($accionSQL){
        case "alta":
            $sentenciaSQL = "insert into usuarios(nombre, email, id_genero, imagen) values('".$nombre."','".$email."',".$genero.",'".$imagen."')";
            $msgExito = "Registro agregado con exito!!!";
            $msgError = "Error al agregar el registro!!!";
            break;
        case "modificar":
            $sentenciaSQL = "update usuarios set nombre='".$nombre."', email='".$email."', id_genero='".$genero."', imagen='".$imagen."' where id=$id";
            $msgExito = "Registro modificado con exito!!!";
            $msgError = "Error al modificar el registro!!!";
            break;
        case "eliminar":
            $sentenciaSQL = "delete from usuarios where id=$id";
            $msgExito = "Registro eliminado con exito!!!";
            $msgError = "Error al eliminar el registro!!!";
            break;
    }
	
    $conexion->query($sentenciaSQL);

    header("Location: index.php");
		
?>