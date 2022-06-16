<?php 

    /*Mapear la URL ingresada en el navegador
    1. Controlador 
    2. Metodo
    3. Parametro 

    Ejemplo /articulos/actualizar/4
    */

    class Core{
        protected $controladorActual = 'Home';
        protected $MetodoActual = 'Index';
        protected $parametros = [];

        //contructor: metodo que se carga automaticamnete cuando se instancia la clase 
        public function __construct()
        {
            //instanciamos el metodo
            $url = $this->getUrl(); 

            //buscar en controladores si el controlador existe, si existe este se setea como controlador por defecto 
            /*el controlador que venia por defecto cuando no se cargue nada en la url que en este caso es paginas ya deja de ser el controlador actual y el actual pasa a ser el controlador encontrado en la carpeta*/
            //$url[0] = controlador 
            if(isset($url[0])){
                if(file_exists('../app/Controllers/' . ucwords($url[0]) . '.php')){
                    $this->controladorActual = ucwords($url[0]);
                    //unset indice 
                    /*para desmontar el controlador actual que empieza siendo paginas*/
                    unset($url[0]);
                }
            }
            //requerir el nuevo controlador 
            require_once '../app/Controllers/' . $this->controladorActual . '.php';
            //ejemplo la variable $paginas  =  new controlador encontrado Paginas() u otro ej: Articulos()
            $this->controladorActual = new $this->controladorActual;


            //Chequear la segunda parte del url que seria el metodo
            //$url[1] = metodo 
            //validamos si se ha seteado la url 
            if(isset($url[1])){
                //verificamos si dentro del controlador existe el metodo ingresado en la url
                if(method_exists($this->controladorActual, $url[1])){
                    //chequeamos el metodo 
                    //le asignamos al metodo actual el valor recibido por la url 
                    $this->MetodoActual = $url[1];
                    //
                    unset($url[1]);
                }
            }

            //para probar traer metodo 
            //echo '<br>' . $this->MetodoActual;


            //obtener posibles parametros 
            $this->parametros = $url ? array_values($url) : [];

            //llamar callback con parametros array, permite traer los arreglos que se hayan configurado en la url 
            
            call_user_func_array([$this->controladorActual, $this->MetodoActual], $this->parametros);
        }

        public function getUrl(){

            //la url se trae desde el htaccess 
            //echo $_GET['url'];

            if(isset($_GET['url'])){
                //rtrim es para cortar los espacios despues del delimintador (en este caso el slash /)que tenga hacia la derecha la url, para dejarla limpia 
                $url = rtrim($_GET['url'],'/');
                //FILTER_SANITIZE_URL para que sea tomado como una url 
                $url = filter_var($url, FILTER_SANITIZE_URL);
                //el delimitador (/)nos permite dividir el controlador, el metodo y el parametro de un string en este caso la url 
                $url = explode('/', $url);
                
                return $url; 
            }
        }

    }


