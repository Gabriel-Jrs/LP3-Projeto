<?php

require_once __DIR__ . '/../config/Database.php';

class Usuario{
private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar(){
    $stmt = $this->db->query("select * from usuarios order by id desc");
    return $stmt->fetchAll();
    }


}