<?php 

class Paginas extends Controlador{

    public function __construct()
    {
        //echo 'controlador pagina cargada';
        $this->usuarioModelo = $this->modelo('usuarioModel');
    }

    public function Index(){
        //Obtener los usuarios 
        $usuarios = $this->usuarioModelo->obtenerUsuarios(); 

        //pasar datos 
        $datos = [
            'Titulo' => 'Bienvenido a MVC',
            'usuarios' => $usuarios
        ];

        $this->vista('paginas/Inicio', $datos);
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

            if($this->usuarioModelo->agregarUsuario($datos)){
                redireccionar('/');
            }
            else{
                die('Algo salio mal');
            }
        }
        else {
            $datos = [
                'status_cod' => ''
            ];

            $this->vista('paginas/agregar', $datos);
        }
    }


    public function editar($id){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'status_id' => $id,
                'status_cod' => trim($_POST['codigo'])
            ];

            if($this->usuarioModelo->actualizarUsuario($datos)){
                redireccionar('/');
            }
            else{
                die('Algo salio mal');
            }
        }
        else {
            //esto esta en el else porque debe ejecutarse antes de que el usuario envie la informacion por post 
            //obtener informacion de usuario desde el modelo validandolo por el id
            $usuario = $this->usuarioModelo->obtenerUsuarioId($id);


            $datos = [
                'status_id' => $usuario->status_id,
                'status_cod' => $usuario->status_cod
            ];

            $this->vista('paginas/editar', $datos);
        }
    }

    public function borrar($id){

        //obtener informacion de usuario desde el modelo validandolo por el id
        $usuario = $this->usuarioModelo->obtenerUsuarioId($id);

        $datos = [
            'status_id' => $usuario->status_id,
            'status_cod' => $usuario->status_cod
        ];


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'status_id' => $id
            ];

            if($this->usuarioModelo->borrarUsuario($datos)){
                redireccionar('/');
            }
            else{
                die('Algo salio mal');
            }
        }
        $this->vista('paginas/borrar', $datos);
    }

    

    
}