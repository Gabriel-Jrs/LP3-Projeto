<?php
require_once __DIR__ . '/../config/Database.php';

class Produto 
{
    private $db;
    private $tabela = 'produtos';

    public function __construct() 
    {
        $this->db = Database::getConnection();
    }

    public function listar() 
    {
        $stmt = $this->db->query("SELECT * FROM {$this->tabela} ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $nomeProduto, float $valor, string $descricao) 
    {
        $sql = "INSERT INTO {$this->tabela} (produto, valor, descricao) VALUES (:produto, :valor, :descricao)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':produto' => $nomeProduto,
            ':valor' => $valor,
            ':descricao' => $descricao
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $nomeProduto, float $valor, string $descricao) 
    {
        $sql = "UPDATE {$this->tabela} SET produto = :produto, valor = :valor, descricao = :descricao WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':produto' => $nomeProduto,
            ':valor' => $valor,
            ':descricao' => $descricao,
            ':id'        => $id,
        ];
        return $stmt->execute($values);
    }

    public function buscarPorId(int $id) 
    {
        $sql = "SELECT * FROM {$this->tabela} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [':id' => $id];
        $stmt->execute($values);
        return $stmt->fetch();
    }

    public function excluir(int $id) 
    {
        $sql = "DELETE FROM {$this->tabela} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [':id' => $id];
        return $stmt->execute($values);
    }
}