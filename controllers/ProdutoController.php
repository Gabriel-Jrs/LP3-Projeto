<?php
class ProdutoController {
    private $model;

    public function __construct() {
        $this->model = new Produto();
    }

    public function index() {
        $produtos = $this->model->listar();
        require __DIR__ . '/../views/produtos/index.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            $nomeProduto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);

            if ($nomeProduto && $valor !== false) {
                $this->model->salvar($nomeProduto, $valor, $descricao);
                header('Location: /lp3_projeto/produtos');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }
        require __DIR__ . '/../views/produtos/criar.php';
    }

    public function editar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /lp3_projeto/produtos');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            $nomeProduto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);

            if ($nomeProduto && $valor !== false) {
                $this->model->atualizar($id, $nomeProduto, $valor, $descricao);
                header('Location: /lp3_projeto/produtos');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }

        $dado = $this->model->buscarPorId($id);
        if (!$dado) {
            header('Location: /lp3_projeto/produtos');
            exit();
        }
        require __DIR__ . '/../views/produtos/editar.php';
    }

    public function excluir() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/produtos');
        exit();
    }
}