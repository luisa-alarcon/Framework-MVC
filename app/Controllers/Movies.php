<?php
class Movies extends Controlador{

    public function __construct()
    {
        $this->usuarioModelo = $this->modelo('MovieModel');
        $this->usuarioStatus = $this->modelo('usuarioModel');
    }

    public function Index(){

        $movies = $this->usuarioModelo->obtenerMovies();

        $datos =[
            'movies' => $movies
        ];

        $this->vista('movies/Index', $datos);
    }

    public function agregar(){
        /*creamos un condicional para validar si se enviaron los datos,
        si se enviaron se guardan en el array datos, y se ejecutara el metodo agregarUsuario
        si no se envia nada, ls campos se enviaran vacios y llamara a la vista nuevamente 
        */
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'imdb_id' => trim($_POST['imdb_id']),
                'title' => trim($_POST['title']),
                'plot' => trim($_POST['plot']),
                'author' => trim($_POST['author']),
                'actors' => trim($_POST['actors']),
                'country' => trim($_POST['country']),
                'premiere' => trim($_POST['premiere']),
                'genres' => trim($_POST['genres']),
                'rating' => trim($_POST['rating']),
                'status' => trim($_POST['status']),
                'category' => trim($_POST['category'])
            ];

            if($this->usuarioModelo->agregarMovie($datos)){
                redireccionar('/movies/Index');
            }
            else{
                die('Algo salio mal');
            }
        }
        else {
            $status = $this->usuarioStatus->obtenerUsuarios();
            $datos = [
                'imdb_id' => '',
                'title' => '',
                'plot' => '',
                'author' => '',
                'actors' => '',
                'country' => '',
                'premiere' => '',
                'genres' => '',
                'rating' => '',
                'status' => '',
                'category' => '',
                'status' => $status
            ];

            $this->vista('movies/agregar', $datos);
        }
    }

    public function actualizarUsuario($id){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'imdb_id' => $id,
                'title' => trim($_POST['title']),
                'plot' => trim($_POST['plot']),
                'author' => trim($_POST['author']),
                'actors' => trim($_POST['actors']),
                'country' => trim($_POST['country']),
                'premiere' => trim($_POST['premiere']),
                'genres' => trim($_POST['genres']),
                'rating' => trim($_POST['rating']),
                'status' => trim($_POST['status']),
                'category' => trim($_POST['category'])
            ];

            if($this->usuarioModelo->actualizarMovie($datos)){
                redireccionar('/movies/Index');
            }
            else{
                die('Algo salio mal');
            }
        }
        else {
            $movies = $this->usuarioModelo->obtenermovieId($id);
            $status = $this->usuarioStatus->obtenerUsuarios();
            $datos = [
                'imdb_id' => $movies->imdb_id ,
                'title' => $movies->title,
                'plot' => $movies->plot,
                'author' => $movies->author,
                'actors' => $movies->actors,
                'country' => $movies->country,
                'premiere' => $movies->premiere,
                'genres' => $movies->genres,
                'rating' => $movies->rating,
                'category' => $movies->category,
                'status' => $status,
                

            ];

            $this->vista('movies/editar', $datos);
        }
    }

    

}