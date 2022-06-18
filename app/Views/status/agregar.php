<?php require RUTA_APP . '/Views/inc/header.php' ?>
    <a href="<?php echo RUTA_URL;?>/status/Inicio" class="btn btn-light"><i class="fa fa-backward">Volver</i></a>
    <div class="container">
        <h3>Agregar Status</h3>
        <form action="<?php echo RUTA_URL;?>/status/agregar" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">status_cod</label>
                <input type="text" name="status_cod" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" value="Agregar">Crear</button>
        </form>
    </div>
<?php require RUTA_APP . '/Views/inc/footer.php' ?>