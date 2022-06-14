<?php require RUTA_APP . '/Views/inc/header.php' ?>
    <a href="<?php echo RUTA_URL;?>/" class="btn btn-light"><i class="fa fa-backward">Volver</i></a>
    <div class="container">
        <h3>Eliminar usuarios</h3>
        <form action="<?php echo RUTA_URL;?>/paginas/borrar/<?php echo $datos['status_id']?>" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">status_cod</label>
                <input type="text" name="codigo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['status_cod']?>">
            </div>
            <button type="submit" class="btn btn-primary" value="borrar">Borrar</button>
        </form>
    </div>
<?php require RUTA_APP . '/Views/inc/footer.php' ?>