<?php
    include ("conexion.php");

    $id_usuario = !empty($_GET['id']) ? $_GET['id'] : null;
    if($id_usuario){
        $consulta = "select * from usuarios where id=$id_usuario";
        $sql = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_array($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/d10d1ac3ef.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div align='center'>
        <br/>
        <form action="sentenciaSQL.php" method="post">
            <?php
                if($id_usuario){
            ?>
                    <input type='text' id='idUsuario' name="idUsuario" value='<?php echo $id_usuario ?>' style="pointer-events: none;" />
                    <br/><br/>
                    <input type='text' id='nombre' name="nombre" value='<?php echo $row['nombre'] ?>' />
                    <br><br/>
                    <input type='text' id='email' name="email" value='<?php echo $row['email'] ?>' />
                    <br><br/>
                    <!-- <input type="submit" name="modificar" value="Guardar" /> -->
            <?php
                }else{
            ?>
                    <input type='text' id='nombre' name="nombre" placeholder="Ingresa nombre" />
                    <br><br/>
                    <input type='text' id='email' name="email" placeholder="Ingresa email" />
                    <br><br/>
                    <!-- <input type="submit" name="agregar" value="Guardar" /> -->
            <?php 
                }
                $sql = mysqli_close($conexion); 
            ?>
            
            <input type="submit" name="guardar" value="Guardar" />
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>