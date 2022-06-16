<?php 

class MovieModel{

    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerMovies(){

        $this->db->query("SELECT m.imdb_id, m.title, m.plot, m.author, m.actors, m.country, m.premiere, m.rating, m.genres, s.status_cod, m.category
        FROM movieseries m JOIN status s ON m.status = s.status_id");

        $resultados = $this->db->registros();

        return $resultados;
    }

    public function agregarMovie($datos){
        $this->db->query('INSERT INTO movieseries (imdb_id, title, plot, author, actors, country, premiere, rating, genres, status, category)
                         Values (:imdb_id, :title, :plot, :author, :actors, :country, :premiere, :rating, :genres, :status, :category)');
        
        $this->db->bind(':imdb_id', $datos['imdb_id']);
        $this->db->bind(':title', $datos['title']);
        $this->db->bind(':plot', $datos['plot']);
        $this->db->bind(':author', $datos['author']);
        $this->db->bind(':actors', $datos['actors']);
        $this->db->bind(':country', $datos['country']);
        $this->db->bind(':premiere', $datos['premiere']);
        $this->db->bind(':genres', $datos['genres']);
        $this->db->bind(':rating', $datos['rating']);
        $this->db->bind(':status', $datos['status']);
        $this->db->bind(':category', $datos['category']);

        

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function actualizarMovie($datos){
        $this->db->query('UPDATE movieseries SET (title=:title, plot=:plot, author=:author, actors=:actors, country=:country, premiere=:premiere, rating=:rating, genres=:genres, status=:status, category=:category) WHERE imdb_id=:imdb_id');
                         
        
        $this->db->bind(':imdb_id', $datos['imdb_id']);
        $this->db->bind(':title', $datos['title']);
        $this->db->bind(':plot', $datos['plot']);
        $this->db->bind(':author', $datos['author']);
        $this->db->bind(':actors', $datos['actors']);
        $this->db->bind(':country', $datos['country']);
        $this->db->bind(':premiere', $datos['premiere']);
        $this->db->bind(':genres', $datos['genres']);
        $this->db->bind(':rating', $datos['rating']);
        $this->db->bind(':status', $datos['status']);
        $this->db->bind(':category', $datos['category']);

        

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
} 