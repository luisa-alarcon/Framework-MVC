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

    public function agregarUsuario($datos){
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

    public function obtenerUsuarioId($id){
        $this->db->query("SELECT * FROM status WHERE status_id = :id");
        $this->db->bind(':id', $id);

        $fila = $this->db->registro();

        return $fila;
    }

    public function actualizarUsuario($datos){
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

    public function borrarUsuario($datos){
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