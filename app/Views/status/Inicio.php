<?php require RUTA_APP . '/Views/inc/header.php' ?>
    
    <div class="container table-responsive">
        <a class="btn btn-primary" href="<?php echo RUTA_URL;?>/status/agregar">Agregar</a>
        <table class="table table-hover ">
            <thead class="table-dark"> 
                <tr>
                    <th scope="col">Status_Id</th>
                    <th scope="col">Status_Cod</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($datos['status'] as $statu) : ?>
                <tr>
                    <td scope="row"><?php echo $statu->status_id; ?></td>
                    <td scope="row"><?php echo $statu->status_cod; ?></td>
                    <td scope="row">
                        <a class="btn btn-primary" href="<?php RUTA_APP; ?> editar/<?php echo $statu->status_id;?>">Editar</a>
                        <a class="btn btn-danger" href="<?php RUTA_APP; ?> borrar/<?php echo $statu->status_id;?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
<?php require RUTA_APP . '/Views/inc/footer.php' ?>


