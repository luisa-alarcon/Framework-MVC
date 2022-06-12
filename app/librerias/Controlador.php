<?php 

//Clase controlador principal 
//se encarga de poder cargar los modelos y las vistas
class Controlador{
    //cargar modelo 
    public function modelo($modelo){
        //carga modelo 
        require_once '../app/Models/' . $modelo . '.php';
        //instanciar el modelo 
        return new $modelo(); 
    }

    //cargar vista
    public function vista($vista, $datos =[]){
        //cheqeuar si el archivo vista existe 
        if(file_exists('../app/Views/' . $vista . '.php')){
            require_once '../app/Views/' . $vista . '.php';
        }
        else{
            //si el archivo no existe 
            die('La vista no existe');
        }
        
    }
}