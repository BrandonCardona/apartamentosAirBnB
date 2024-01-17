<?php require_once "views/shared/header.php"; ?>

<div class="container">
        <h1 class="text-center my-5"><?= $data['titulo']?></h1>
        <p>
            <span class="fw-bold">ID:</span>
            <?= $data['cliente']['id']?>
        </p>
        <p>
            <span class="fw-bold">Nombre del cliente:</span>
            <?= $data['cliente']['nombre']?>
        </p>
        <p>
            <span class="fw-bold">Numero de documento:</span>
            <?= $data['cliente']['numeroDocumento']?> 
        </p>
        <p>
            <span class="fw-bold">Ciudad de origen:</span>
            <?= $data['cliente']['ciudadOrigen']?>
        </p>
        <p>
            <span class="fw-bold">Numero de acompañantes:</span>
            <?= $data['cliente']['numAcompaniantes']?> 
        </p>
        <p>
            <span class="fw-bold">Fecha inicial:</span>
            <?= $data['cliente']['fechaInicial']?> 
        </p>
        <p>
            <span class="fw-bold">Fecha final:</span>
            <?= $data['cliente']['fechaFinal']?> 
        </p>
        <p>
            <span class="fw-bold">Cantidad de días alquilados:</span>
            <?= $data['cliente']['cantDiasAlquilado']?> dias.
        </p>
        <p>
            <span class="fw-bold">Apartamento:</span>
            <?= $data['apartamento']['alias']?> 
        </p>
        <a href="index.php?controlador=cliente" class="btn btn-primary">Volver</a>
    </div>

<?php require_once "views/shared/footer.php"; ?>