<?php 

class Paginas extends Controlador{

    public function __construct()
    {
        
        //echo 'controlador pagina cargada';
    }

    public function Index(){
        //echo '<br>'. 'index';
        //pasar datos 
        $datos = [
            'Titulo' => 'Bienvenido a MVC',
            
        ];

        $this->vista('paginas/Inicio', $datos);
    }

    

    
}