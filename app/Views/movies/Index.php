<?php require RUTA_APP . '/Views/inc/header.php' ?>
<a href="<?php echo RUTA_URL;?>/movies/agregar" class="btn btn-light"><i class="fa fa-backward">Agregar</i></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>imdb_id</th>
                <th>title</th>
                <th>plot</th>
                <th>author</th>
                <th>actors</th>
                <th>country</th>
                <th>premiere</th>
                <th>rating</th>
                <th>status</th>
                <th>category</th>
                <th>Aciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($datos['movies'] as $movie) : ?>
            <tr>
                <td><?php echo $movie->imdb_id; ?></td>
                <td><?php echo $movie->title; ?></td>
                <td><?php echo $movie->plot; ?></td>
                <td><?php echo $movie->author; ?></td>
                <td><?php echo $movie->actors; ?></td>
                <td><?php echo $movie->country; ?></td>
                <td><?php echo $movie->premiere; ?></td>
                <td><?php echo $movie->rating; ?></td>
                <td><?php echo $movie->status_cod; ?></td>
                <td><?php echo $movie->category; ?></td>
                <td><a href="<?php RUTA_APP; ?> editar/<?php echo $movie->imdb_id;?>">Editar</a></td>
                <td><a href="<?php RUTA_APP; ?> borrar/<?php echo $movie->imdb_id;?>">Eliminar</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php require RUTA_APP . '/Views/inc/footer.php' ?>