<?php

    require 'conexion.php';

    $id = $conexion->real_escape_string($_POST['id']);

    $sql = "select * from usuarios where id=$id limit 1";
    $resultado = $conexion->query($sql);
    $rows = $resultado->num_rows;

    $usuario = [];

    if($rows > 0){
        $usuario = $resultado->fetch_array();
    }

    echo json_encode($usuario, JSON_UNESCAPED_UNICODE);

