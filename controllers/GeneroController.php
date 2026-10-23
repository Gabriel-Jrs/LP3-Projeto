<?php
class GeneroController {
    private $model;

    public function __construct() {
        $this->model = new Genero();
    }

    public function index() {
        $generos = $this->model->listar();
        require __DIR__ . '/../views/generos/index.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($nome && $descricao) {
                $this->model->salvar($nome, $descricao);
                header('Location: /lp3_projeto/generos');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }
        require __DIR__ . '/../views/generos/criar.php';
    }

    public function editar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /lp3_projeto/generos');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($nome && $descricao) {
                $this->model->atualizar($id, $nome, $descricao);
                header('Location: /lp3_projeto/generos');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }

        $dado = $this->model->buscarPorId($id);
        if (!$dado) {
            header('Location: /lp3_projeto/generos');
            exit();
        }
        require __DIR__ . '/../views/generos/editar.php';
    }

    public function excluir() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/generos');
        exit();
    }
}