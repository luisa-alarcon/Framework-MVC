<?php 

class usuarioModel{
    //Manejador de la base de datos
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerUsuarios(){
        $this->db->query('SELECT * FROM status');
        //la funcion registros viene de la base
        $resultados = $this->db->registros();

        return $resultados;
    }
}