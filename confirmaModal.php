<!-- Modal -->
<div class="modal fade" id="confirmaModal" tabindex="-1" aria-labelledby="confirmaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="confirmaModalLabel">Confirmar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label">¿Estás seguro de eliminar el registro?</label>
            </div>
            <div class="modal-footer">
                <form action="sentenciaSQL.php" method="post">
                    
                    <input type="hidden" id="id" name="id" />

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Cerrar</button>
                    <button type="submit" class="btn btn-danger" id="eliminar" name="eliminar"><i class="fa-solid fa-trash"></i> Eliminar</button>
                
                </form>
            </div>
        </div>
    </div>
</div>
