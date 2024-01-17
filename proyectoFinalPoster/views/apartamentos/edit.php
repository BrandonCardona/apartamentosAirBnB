<?php require_once "views/shared/header.php"; ?>

    <div class="container">
        <h1 class="text-center my-5">
            <?= $data['titulo'] ?>
        </h1>
        <form action="index.php?controlador=apartamento&accion=update" class="needs-validation" method="post">
        <input type="hidden" name="id" value="<?= $data['id']?>">
            <div class="mb-3">
                <label for="alias" class="form-label">Alias:</label>
                <input type="text" class="form-control" id="alias" name="alias" value="<?= $data['apartamento']['alias']?>" required>
            </div>
            <div class="mb-3">         
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $data['apartamento']['direccion']?>" required>
            </div>
            <div class="mb-3">
                <label for="cantidadCamas" class="form-label">Cantidad de camas:</label>
                <input type="number" class="form-control" id="cantidadCamas" name="cantidadCamas" value="<?= $data['apartamento']['cantidadCamas']?>" required> 
            </div>
            <div class="mb-3">
                <label for="capacidad" class="form-label">Capacidad:</label>
                <input type="number" class="form-control" id="capacidad" name="capacidad" value="<?= $data['apartamento']['capacidad']?>" required>
            </div>
            <div class="mb-3">
                <label for="precioDia" class="form-label">Precio por día:</label>
                <input type="number" class="form-control" id="precioDia" name="precioDia" value="<?= $data['apartamento']['precioDia']?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

<?php require_once "views/shared/footer.php"; ?>