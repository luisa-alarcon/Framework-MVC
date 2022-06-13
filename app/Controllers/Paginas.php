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

    

    
}