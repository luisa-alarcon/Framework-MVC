<?php 
//redireccionar la pagina 

function redireccionar($pagina){
    header('localhost' . RUTA_URL . $pagina);
} 