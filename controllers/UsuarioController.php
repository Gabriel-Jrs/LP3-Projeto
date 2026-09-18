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

public function adicionar(){
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $nome = filter_input(INPUT_POST, 'nome' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email' , FILTER_VALIDATE_EMAIL);

        if($nome && $email){
            $this->model->salvar($nome, $email);
            header('Location: /lp3_projeto/usuarios');
            exit;

            }
    }
    require __DIR__ . '/../views/usuarios/criar.php';
}
}