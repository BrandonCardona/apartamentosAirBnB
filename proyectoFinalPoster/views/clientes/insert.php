<?php require_once "views/shared/header.php"; ?>

    <div class="container">
        <h1 class="text-center my-5">
            <?= $data['titulo'] ?>
        </h1>
        <form action="index.php?controlador=cliente&accion=validarFechas" class="needs-validation" method="post">
            <input type="hidden" name="valorVista" value="0">  
            <div class="mb-3">
                <label for="fechaInicial" class="form-label">Fecha inicial</label>
                <?php if(isset($data['valores'][4])){?>
                    <input type="date" class="form-control" id="fechaInicial" name="fechaInicial" value="<?= $data['valores'][4]?>" required>
                <?php }else{?>
                    <input type="date" class="form-control" id="fechaInicial" name="fechaInicial" required>
                <?php }?>
            </div>
            <div class="mb-3">
                <label for="fechaFinal" class="form-label">Fecha final</label>
                <?php if(isset($data['valores'][5])){?>
                    <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" value="<?= $data['valores'][5]?>" required>
                <?php }else{?>
                    <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" required>
                <?php }?>
            </div>
            <h2 class="text-center my-5">INFORMACIÓN DEL CLIENTE</h2>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <?php if(isset($data['valores'][0])){?>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $data['valores'][0]?>" required>
                <?php }else{?>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                <?php }?>
            </div>
            <div class="mb-3">
                <label for="numeroDocumento" class="form-label">Numero de documento</label>
                <?php if(isset($data['valores'][1])){?>
                    <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento" value="<?= $data['valores'][1]?>" required>
                <?php }else{?>
                <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento" required>
                <?php }?>
            </div>
            <div class="mb-3">
                <label for="ciudadOrigen" class="form-label">Ciudad de origen</label>
                <?php if(isset($data['valores'][2])){?>
                    <input type="text" class="form-control" id="ciudadOrigen" name="ciudadOrigen" value="<?= $data['valores'][2]?>" required>
                <?php }else{?>
                    <input type="text" class="form-control" id="ciudadOrigen" name="ciudadOrigen" required>
                <?php }?>
            </div>
            <div class="mb-3">
                <label for="numAcompaniantes" class="form-label">Numero de acompañantes</label>
                <?php if(isset($data['valores'][3])){?>
                    <input type="number" class="form-control" id="numAcompaniantes" name="numAcompaniantes" value="<?= $data['valores'][3]?>" required>
                <?php }else{?>
                    <input type="number" class="form-control" id="numAcompaniantes" name="numAcompaniantes" required>
                <?php }?>
            </div>
            <div class="mb-3">
                <label for="apartamento" class="form-label">Apartamento</label>
                <select class="form-select" type="number" aria-label="Default select example" id="apartamento" name="apartamento">
                <?php foreach($data['apartamentos'] as $item){?>

                    <?php if($data['valores'][6] == $item['id_apartamento']){?>
                        <option value="<?= $data['valores'][6]?>" style="background-color: #3e3636;" selected><?= $item['alias']?></option>
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