<?php require_once "views/shared/header.php"; ?>

    <div class="container">
        <h1 class="text-center my-5"><?= $data["titulo"] ?></h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['clientes'] as $cliente) {?>
                    <tr>
                        <td><?= $cliente['nombre']?></td>
                        <td>
                            <?= "<a href='index.php?controlador=cliente&accion=view&id=" . $cliente['id'] . "' class='btn btn-info me-3'>Ver</a>" ?>
                            <?= "<a href='index.php?controlador=cliente&accion=edit&id=" . $cliente['id'] . "' class='btn btn-warning me-3'>Editar</a>" ?>
                            <?= "<a href='index.php?controlador=cliente&accion=delete&id=" . $cliente['id'] . "' class='btn btn-danger'>Eliminar</a>" ?>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

<?php require_once "views/shared/footer.php"; ?>