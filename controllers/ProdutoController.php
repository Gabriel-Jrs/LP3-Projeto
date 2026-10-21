<?php
class ProdutoController {
    private $model;
    private $categoriaModel;

    public function __construct() {
        $this->model = new Produto();
        $this->categoriaModel = new Categoria();
    }

    public function index() {
        $produtos = $this->model->listar();
        require __DIR__ . '/../views/produtos/index.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);
            $categoria_id = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);

            if ($produto && $valor !== false && $categoria_id !== false) {
                $this->model->salvar($produto, $valor, $categoria_id, $descricao);
                header('Location: /lp3_projeto/produtos');
                exit();
            } else {
                $erro = "Dados inválidos. Por favor, verifique os campos.";
            }
        }
        $categorias = $this->categoriaModel->listar();
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
            $categoria_id = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);

            if ($nomeProduto && $valor !== false && $categoria_id !== false) {
                $this->model->atualizar($id, $nomeProduto, $valor, $categoria_id, $descricao);
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