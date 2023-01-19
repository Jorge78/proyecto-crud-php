<?php
    include ("conexion.php");
    
    $sqlUsuarios = "select u.*, g.genero from usuarios as u inner join generos as g on u.id_genero = g.id";
    $usuarios = $conexion->query($sqlUsuarios);
?>
<!DOCTYPE html>
<html lang="es">
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
    <!-- <header>
        <h2>Proyecto CRUD</h2>
    </header> -->
    <div class="container py-3">
        <div class="row align-items-start">
            <div class="col-9">
                <div class="col-auto">
                    <h2>Proyecto CRUD con PHP-MySQL-Bootstrap</h2>
                </div>
            </div>
            <div class="col-3">
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <a href='#' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ventanaModal">
                            <i class="fa-solid fa-circle-plus"></i> Agregar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <table id='cebra' class='table table-sm table-striped table-hover mt-2'>
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Género</th>
                    <!-- <th>Imagen</th> -->
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row_usuario = $usuarios->fetch_assoc()){ ?>
                    <tr>
                        <td><?= $row_usuario['id']; ?></td>
                        <td><?= $row_usuario['nombre']; ?></td>
                        <td><?= $row_usuario['email']; ?></td>
                        <td><?= $row_usuario['genero']; ?></td>
                        <!-- <td></td> -->
                        <td>
                            <a href='#' class="btn btn-sm btn-warning" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#ventanaModal"
                                        data-bs-id="<?= $row_usuario['id']; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href='#' class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#confirmaModal"
                                        data-bs-id="<?= $row_usuario['id']; ?>">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
            $sqlGenero = "select * from generos";
            $generos = $conexion->query($sqlGenero);
        ?>

        <?php $generos->data_seek(0); ?>

        <?php include 'ventanaModal.php' ?>

        <?php include 'confirmaModal.php' ?>

        <script>

            let editaModal = document.getElementById('ventanaModal');
            let eliminaModal = document.getElementById('confirmaModal');

            editaModal.addEventListener('shown.bs.modal', event => {
                let button = event.relatedTarget;
                let id = button.getAttribute('data-bs-id');

                let lblTitulo = editaModal.querySelector('.modal-header #ventanaModalLabel');
                let inputId = editaModal.querySelector('.modal-body #id');
                let inputNombre = editaModal.querySelector('.modal-body #nombre');
                let inputEmail = editaModal.querySelector('.modal-body #email');
                let inputGenero = editaModal.querySelector('.modal-body #genero');
                let inputImagen = editaModal.querySelector('.modal-body #imagen');

                lblTitulo.innerHTML = "Agregar registro";
                inputId.value = "";
                inputNombre.value = "";
                inputEmail.value = "";
                inputGenero.value = "0";
                inputImagen.value = "";

                if(id){
                    let url = 'getUsuarios.php';
                    let formData = new FormData();
                    formData.append('id', id);

                    fetch(url, {
                        method: "POST",
                        body: formData
                    }).then(response => response.json())
                    .then(data => {
                        lblTitulo.innerHTML = "Modificar registro";
                        inputId.value = data.id;
                        inputNombre.value = data.nombre;
                        inputEmail.value = data.email;
                        inputGenero.value = data.id_genero;
                        //inputImagen.value = data.imagen;
                    }).catch(err => console.log(err));
                }

            });

            eliminaModal.addEventListener('shown.bs.modal', event => {
                let button = event.relatedTarget;
                let id = button.getAttribute('data-bs-id');

                let inputId = eliminaModal.querySelector('.modal-footer #id').value = id;
            });

        </script>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>