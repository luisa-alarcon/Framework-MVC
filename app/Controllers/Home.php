<?php
class Home extends Controlador{

    public function __construct()
    {
        $this->usuarioModelo = $this->modelo('MovieModel');
    }

    public function Index(){

        $this->vista('home/Index');
    }
}