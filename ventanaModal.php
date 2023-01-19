<!-- Modal -->
<div class="modal fade" id="ventanaModal" tabindex="-1" aria-labelledby="ventanaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ventanaModalLabel">Agregar registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="sentenciaSQL.php" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" id="id" name="id" />

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type='text' id='nombre' name="nombre" class="form-control" placeholder="Ingresa nombre" required />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type='text' id='email' name="email" class="form-control" placeholder="Ingresa email" required />
                    </div>
                    <div class="row align-items-start">
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="genero" class="form-label">Género:</label>
                                <select id='genero' name="genero" class="form-select" required >
                                    <option value="0">Seleccionar...</option>
                                    <?php while($row_genero = $generos->fetch_assoc()){ ?>
                                        <option value="<?php echo $row_genero['id'] ?>"><?= $row_genero['genero'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="mb-3">
                                <!-- <label for="imagen" class="form-label">Imagen:</label> -->
                                <input type='hidden' id='imagen' name="imagen" class="form-control" accept="image/jpg" />
                            </div>
                        </div>  
                    </div>
                    
                    <div class="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="guardar" name="guardar"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
