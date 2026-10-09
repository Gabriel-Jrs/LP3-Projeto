<?php
require_once __DIR__ . '/../config/Database.php';

class Cliente 
{
    private $db;
    private $tabela = 'filmes';

    public function __construct() 
    {
        $this->db = Database::getConnection();
    }

    public function listar() 
    {
        $stmt = $this->db->query("SELECT * FROM {$this->tabela} ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $nomeDoFilme, string $diretor, string $duracaoFilme,  string $imagem) 
    {
        $sql = "INSERT INTO {$this->tabela} (nomeDoFilme, diretor, duracaoFilme, salario, imagem, data, obs) VALUES (:nomeDoFilme, :diretor, :duracaoFilme, :imagem)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nomeDoFilme' => $nomeDoFilme,
            ':diretor' => $diretor,
            ':duracaoFilme' => $duracaoFilme,
            ':imagem' => $imagem,
            
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $nomeDoFilme, string $diretor, string $duracaoFilme, float $salario, string $imagem, string $data, string $obs) 
    {
        $sql = "UPDATE {$this->tabela} SET nomeDoFilme = :nomeDoFilme, diretor = :diretor, duracaoFilme = :duracaoFilme, imagem = :imagem, WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nomeDoFilme' => $nomeDoFilme,
            ':diretor' => $diretor,
            ':duracaoFilme' => $duracaoFilme,
            ':imagem' => $imagem,
            
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