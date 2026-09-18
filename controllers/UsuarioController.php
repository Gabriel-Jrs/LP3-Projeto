<?php

class UsuarioController{
private $model;


public function __construct()
{
$this->model = new Usuario();

}

public function index(){
    $usuarios = $this->model->listar();
    require __dir__ . '/../views/usuarios/index.php';
}

}