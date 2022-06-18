<?php 

class Status extends Controlador{

    public function __construct()
    {
        //echo 'controlador pagina cargada';
        $this->statusModelo = $this->modelo('statusModel');
    }

    public function Index(){
        //Obtener los usuarios 
        $status = $this->statusModelo->obtenerStatus(); 

        //pasar datos 
        $datos = [
            'Titulo' => 'Bienvenido a MVC',
            'status' => $status
        ];

        $this->vista('status/Inicio', $datos);
    }

    public function agregar(){
        /*creamos un condicional para validar si se enviaron los datos,
        si se enviaron se guardan en el array datos, y se ejecutara el metodo agregarUsuario
        si no se envia nada, ls campos se enviaran vacios y llamara a la vista nuevamente 
        */
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'status_cod' => trim($_POST['status_cod'])
            ];

            if($this->statusModelo->agregarStatus($datos)){
                redireccionar('/status/inicio');
            }
            else{
                die('Algo salio mal');
            }
        }
        else {
            $datos = [
                'status_cod' => ''
            ];

            $this->vista('status/agregar', $datos);
        }
    }


    public function editar($id){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'status_id' => $id,
                'status_cod' => trim($_POST['codigo'])
            ];

            if($this->statusModelo->actualizarStatus($datos)){
                redireccionar('/status/inicio');
            }
            else{
                die('Algo salio mal');
            }
        }
        else {
            //esto esta en el else porque debe ejecutarse antes de que el usuario envie la informacion por post 
            //obtener informacion de usuario desde el modelo validandolo por el id
            $status = $this->statusModelo->obtenerStatusId($id);


            $datos = [
                'status_id' => $status->status_id,
                'status_cod' => $status->status_cod
            ];

            $this->vista('status/editar', $datos);
        }
    }

    public function borrar($id){

        //obtener informacion de usuario desde el modelo validandolo por el id
        $status = $this->statusModelo->obtenerStatusId($id);

        $datos = [
            'status_id' => $status->status_id,
            'status_cod' => $status->status_cod
        ];


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'status_id' => $id
            ];

            if($this->statusModelo->borrarStatus($datos)){
                redireccionar('/status/inicio');
            }
            else{
                die('Algo salio mal');
            }
        }
        $this->vista('status/borrar', $datos);
    }

    

    
}