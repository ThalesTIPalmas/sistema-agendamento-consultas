<?php
// models/Medico.php - Modelo para a tabela 'medicos'

require_once __DIR__ . '/../config.php'; // Inclui as configurações do banco de dados
require_once __DIR__ . '/../Database.php'; // CORRIGIDO: Inclui a classe Database

class Medico {
    private $conn;
    private $table_name = "medicos"; // Nome da tabela no banco de dados

    // Propriedades do médico
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $especialidade;

    // Construtor para conexão com o banco de dados
    public function __construct() {
        $database = new Database(); // Cria uma instância da classe Database
        $this->conn = $database->getConnection(); // Obtém a conexão com o banco
    }

    // Método para criar um novo médico
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, email=:email, senha=:senha, especialidade=:especialidade";
        $stmt = $this->conn->prepare($query);

        // Limpeza e sanitização dos dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = password_hash($this->senha, PASSWORD_BCRYPT); // Hash da senha para segurança
        $this->especialidade = htmlspecialchars(strip_tags($this->especialidade));

        // Vincula os valores
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":especialidade", $this->especialidade);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para ler todos os médicos
    public function getAll() {
        $query = "SELECT id, nome, email, especialidade FROM " . $this->table_name . " ORDER BY nome ASC";
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