<?php
require_once __DIR__ . '/../config/Database.php';

class Categoria 
{
    private $db;
    private $tabela = 'categorias';

    public function __construct() 
    {
        $this->db = Database::getConnection();
    }

    public function listar() 
    {
        $stmt = $this->db->query("SELECT * FROM {$this->tabela} ORDER BY id ASC");
        return $stmt->fetchAll();
    }

    public function salvar(string $categoria, string $descricao) 
    {
        $sql = "INSERT INTO {$this->tabela} (categoria, descricao) VALUES (:categoria, :descricao)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':categoria' => $categoria,
            ':descricao' => $descricao
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $categoria, string $descricao) 
    {
        $sql = "UPDATE {$this->tabela} SET categoria = :categoria, descricao = :descricao WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':categoria' => $categoria,
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