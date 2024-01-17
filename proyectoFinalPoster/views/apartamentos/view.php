<?php require_once "views/shared/header.php"; ?>

<div class="container">
        <h1 class="text-center my-5"><?= $data['titulo']?></h1>
        <p>
            <span class="fw-bold">ID:</span>
            <?= $data['apartamento']['id_apartamento']?>
        </p>
        <p>
            <span class="fw-bold">Alias del apartamento:</span>
            <?= $data['apartamento']['alias']?>
        </p>
        <p>
            <span class="fw-bold">Direccion:</span>
            <?= $data['apartamento']['direccion']?> 
        </p>
        <p>
            <span class="fw-bold">Cantidad de camas:</span>
            <?= $data['apartamento']['cantidadCamas']?> 
        </p>
        <p>
            <span class="fw-bold">Capacidad:</span>
            <?= $data['apartamento']['capacidad']?> 
        </p>
        <p>
            <span class="fw-bold">Precio del dia:</span>
            <?= $data['apartamento']['precioDia']?> 
        </p>
        <p>
            <span class="fw-bold">Cantidad de días alquilados:</span>
            <?= $data['apartamento']['cantDiasAlquilado']?> dias.
        </p>
        <a href="index.php?controlador=apartamento" class="btn btn-primary">Volver</a>
    </div>

<?php require_once "views/shared/footer.php"; ?>