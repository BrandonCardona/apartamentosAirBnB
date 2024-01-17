<?php require_once "views/shared/header.php"; ?>

    <div class="container">
        <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
        <form action="index.php?controlador=Apartamento&accion=store" method="post">
            <div class="mb-3">
                <label for="alias" class="form-label">Alias:</label>
                <input type="text" class="form-control" id="alias" name="alias" placeholder="Ingrese el alias del apt" required>
            </div>
            <div class="mb-3">         
            <label for="direccion" class="form-label">Direccion:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la direccion" required>
            </div>
            <div class="mb-3">
            <label for="cantidadCamas" class="form-label">Cantidad de camas:</label>
            <input type="number" class="form-control" id="cantidadCamas" name="cantidadCamas" placeholder="Ingrese la cantidad de camas" required> 
            </div>
            <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad:</label>
            <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="Ingrese la capacidad" required>
            </div>
            <div class="mb-3">
            <label for="precioDia" class="form-label">Precio por día:</label>
            <input type="number" class="form-control" id="precioDia" name="precioDia" placeholder="Ingrese el precio por dia" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

<?php require_once "views/shared/footer.php"; ?>