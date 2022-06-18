<?php 

class statusModel{
    //Manejador de la base de datos
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerStatus(){
        $this->db->query('SELECT * FROM status');
        //la funcion registros viene de la base
        $resultados = $this->db->registros();

        return $resultados;
    }

    public function agregarStatus($datos){
        //consulta
        $this->db->query("INSERT INTO `status` (`status_cod`) VALUES (:status_cod)");
        //vincular valores
        $this->db->bind(':status_cod', $datos['status_cod']);
        //ejecutar
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function obtenerStatusId($id){
        $this->db->query("SELECT * FROM status WHERE status_id = :id");
        $this->db->bind(':id', $id);

        $fila = $this->db->registro();

        return $fila;
    }

    public function actualizarStatus($datos){
        $this->db->query('UPDATE `status` SET `status_cod`= :status_cod WHERE status_id = :id');
        $this->db->bind(':id', $datos['status_id']);
        $this->db->bind(':status_cod', $datos['status_cod']);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function borrarStatus($datos){
        $this->db->query('DELETE FROM `status` WHERE status_id = :id');
        $this->db->bind(':id', $datos['status_id']);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}