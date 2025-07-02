<?php
// Database.php - Classe para gerenciar a conexão com o banco de dados

require_once __DIR__ . '/config.php'; // Inclui o arquivo de configuração

class Database {
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;
    public $conn;

    // Conexão com o banco de dados
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Ativa o modo de erro para PDO
        } catch(PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
            // Em um ambiente de produção, você pode querer logar o erro em vez de exibi-lo
            die(); // Interrompe a execução do script
        }

        return $this->conn;
    }
}
?>