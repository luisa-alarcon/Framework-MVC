<?php require RUTA_APP . '/Views/inc/header.php' ?>
    <a href="<?php echo RUTA_URL;?>/movies/Index" class="btn btn-light"><i class="fa fa-backward">Volver</i></a>
    <div class="container">
        <h3>Editar Pelicula</h3>
        <form action="<?php echo RUTA_URL;?>/movies/eliminar/<?php echo $datos['imdb_id']?>" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['title']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Plot</label>
                <input type="text" name="plot" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['plot']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Author</label>
                <input type="text" name="author" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['author']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Actors</label>
                <input type="text" name="actors" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['actors']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">country</label>
                <input type="text" name="country" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['country']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">premiere</label>
                <input type="text" name="premiere" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['premiere']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">rating</label>
                <input type="text" name="rating" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['rating']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">genres</label>
                <input type="text" name="genres" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['genres']?>">
            </div>
            <div>
                <label>Seleccione un status</label>
                <select class="form-select" name="status" id="cars">
                    <?php foreach ($datos['status'] as $usuario) :?>
                        <option value="<?php echo $usuario->status_id?>"><?php echo $usuario->status_cod?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">category</label>
                <input type="text" name="category" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['category']?>">
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary" value="eliminar">Eliminar</button>
            </div>
            
        </form>
    </div>
<?php require RUTA_APP . '/Views/inc/footer.php' ?>