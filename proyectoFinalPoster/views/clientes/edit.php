<?php require_once "views/shared/header.php"; ?>

<div class="container">
        <h1 class="text-center my-5">
            <?= $data['titulo'] ?>
        </h1>
        <form action="index.php?controlador=cliente&accion=validarFechas" class="needs-validation" method="post">
            <input type="hidden" name="id" value="<?= $data['id']?>">
            <input type="hidden" name="cantDiasAlquiladoCliente" value="<?= $data['cantDiasAlquiladoCliente']?>">  
            <input type="hidden" name="idApartamentoCliente" value="<?= $data['idApartamentoCliente']?>">
            <input type="hidden" name="valorVista" value="1">  
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $data['cliente']['nombre']?>" required>
            </div>
            <div class="mb-3">
                <label for="numeroDocumento" class="form-label">Numero de documento</label>
                <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento" value="<?= $data['cliente']['numeroDocumento']?>" required>
            </div>
            <div class="mb-3">
                <label for="ciudadOrigen" class="form-label">Ciudad de origen</label>
                <input type="text" class="form-control" id="ciudadOrigen" name="ciudadOrigen" value="<?= $data['cliente']['ciudadOrigen']?>" required>
            </div>
            <div class="mb-3">
                <label for="numAcompaniantes" class="form-label">Numero de acompañantes</label>
                <input type="number" class="form-control" id="numAcompaniantes" name="numAcompaniantes" value="<?= $data['cliente']['numAcompaniantes']?>" required>
            </div>
            <div class="mb-3">
                <label for="fechaInicial" class="form-label">Fecha inicial</label>
                <input type="date" class="form-control" id="fechaInicial" name="fechaInicial" value="<?= $data['cliente']['fechaInicial']?>" required>
            </div>
            <div class="mb-3">
                <label for="fechaFinal" class="form-label">Fecha final</label>
                <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" value="<?= $data['cliente']['fechaFinal']?>" required>
            </div>
            <div class="mb-3">
                <label for="apartamento" class="form-label">Apartamento</label>
                <select class="form-select hola" aria-label="Default select example" id="apartamento" name="apartamento">
                <?php foreach($data['apartamentos'] as $item){?>

                    <?php if($item['id_apartamento'] == $data['cliente']['idApartamento']){?>
                        <option value="<?= $item['id_apartamento']?>" style="background-color: #3e3636;" selected><?= $data['nombreApartamento']?></option>
                    <?php }else{?>
                        <option value="<?= $item['id_apartamento']?>" style="background-color: #3e3636;"><?= $item['alias']?></option>
                    <?php }?>

                <?php }?>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    
    <?php if(isset($data['valor'])){ ?>
        <script>
            alert('El apartamento ya se encuentra arrendado para esa fecha');
        </script>
    <?php }?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>