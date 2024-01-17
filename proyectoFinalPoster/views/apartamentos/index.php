<?php require_once "views/shared/header.php"; ?>

    <div class="container">
        <h1 class="text-center my-5"><?= $data["titulo"] ?></h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Alias</th>
                    <th>Acciones</th>
                    <th>Huespedes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['apartamentos'] as $apartamento) {?>
                    <tr>
                        <td><?= $apartamento['alias']?></td>
                        <td>
                            <?= "<a href='index.php?controlador=apartamento&accion=view&id=" . $apartamento['id_apartamento'] . "' class='btn btn-info me-3'>Ver</a>" ?>
                            <?= "<a href='index.php?controlador=apartamento&accion=edit&id=" . $apartamento['id_apartamento'] . "' class='btn btn-warning me-3'>Editar</a>" ?>
                            <?= "<a href='index.php?controlador=apartamento&accion=delete&id=" . $apartamento['id_apartamento'] . "' class='btn btn-danger'>Eliminar</a>" ?>
                        </td>
                        <td><a href="index.php?controlador=cliente&accion=listarClientes&id=<?= $apartamento['id_apartamento']?>" class="btn btn-info">Ver listado</a></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

<?php require_once "views/shared/footer.php"; ?>