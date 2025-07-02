<?php
// models/Paciente.php - Modelo para a tabela 'pacientes'

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../Database.php'; // CORRIGIDO: Inclui a classe Database

class Paciente {
    private $conn;
    private $table_name = "pacientes";

    // Propriedades do paciente
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $data_nascimento;
    public $telefone;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Método para criar um novo paciente
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, email=:email, senha=:senha, data_nascimento=:data_nascimento, telefone=:telefone";
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = password_hash($this->senha, PASSWORD_BCRYPT);
        $this->data_nascimento = htmlspecialchars(strip_tags($this->data_nascimento));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":data_nascimento", $this->data_nascimento);
        $stmt->bindParam(":telefone", $this->telefone);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para ler todos os pacientes
    public function getAll() {
        $query = "SELECT id, nome, email, data_nascimento, telefone FROM " . $this->table_name . " ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para verificar se um e-mail já existe
    public function emailExists() {
        $query = "SELECT id FROM " . $this->table_name . " WHERE email = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
?>