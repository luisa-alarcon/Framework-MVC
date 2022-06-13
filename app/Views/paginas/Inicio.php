<?php require RUTA_APP . '/Views/inc/header.php' ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Status_Id</th>
                <th>Status_Cod</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($datos['usuarios'] as $usuario) : ?>
            <tr>
                <td><?php echo $usuario->status_id; ?></td>
                <td><?php echo $usuario->status_cod; ?></td>
                <td><a href="<?php RUTA_APP; ?> paginas/editar/<?php echo $usuario->status_id;?>">Editar</a></td>
                <td><a href="<?php RUTA_APP; ?> paginas/borrar/<?php echo $usuario->status_id;?>">Eliminar</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php require RUTA_APP . '/Views/inc/footer.php' ?>


