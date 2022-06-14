<?php 
//redireccionar la pagina 

function redireccionar($pagina){
    header('location: ' . RUTA_URL . $pagina);
} 