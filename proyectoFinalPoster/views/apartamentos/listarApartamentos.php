<?php require_once "views/shared/header.php"; ?>
    
    <div class="container">
        <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
        <!-- <a href="index.php?controlador=proyecto&accion=insert" class="btn btn-primary">Crear nuevo proyecto</a> -->
        <table class="table">
            <thead>
                <tr>
                    <th>Alias</th>
                    <th>Dias alquilados</th>
                    <th>Precio por dia</th>
                    <th>Valor del arriendo</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 0;
                foreach($data['apartamentos'] as $item) { ?>
                    <tr>
                        
                        <td><?= $item['alias'] ?></td>
                        <td><?= $item['cantDiasAlquilado']?></td>
                        <td><?= $item['precioDia']?></td>
                        <td><?= $data['precioApartamentos'][$contador]?></td>
                    </tr>
                <?php $contador++;}  ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <tr>
                    <td></td>
                    <td></td>
                    <td><span span class="fw-bold">TOTAL POR ARRIENDO</span></td>
                    <td><?= $data['total']?></td>
                </tr>
            </tbody>
        </table>
        <a href="index.php?controlador=apartamento" class="btn btn-primary">Volver</a>
    </div>

    <?php require_once "views/shared/footer.php"; ?>