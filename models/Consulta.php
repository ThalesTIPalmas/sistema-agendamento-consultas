<?php
// models/Consulta.php - Modelo para a tabela 'consultas'

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../Database.php'; // CORRIGIDO: Inclui a classe Database

class Consulta {
    private $conn;
    private $table_name = "consultas";

    // Propriedades da consulta
    public $id;
    public $paciente_id;
    public $medico_id;
    public $data_consulta;
    public $hora_consulta;
    public $status;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Método para criar uma nova consulta
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET paciente_id=:paciente_id, medico_id=:medico_id, data_consulta=:data_consulta, hora_consulta=:hora_consulta, status='Agendada'";
        $stmt = $this->conn->prepare($query);

        $this->paciente_id = htmlspecialchars(strip_tags($this->paciente_id));
        $this->medico_id = htmlspecialchars(strip_tags($this->medico_id));
        $this->data_consulta = htmlspecialchars(strip_tags($this->data_consulta));
        $this->hora_consulta = htmlspecialchars(strip_tags($this->hora_consulta));

        $stmt->bindParam(":paciente_id", $this->paciente_id);
        $stmt->bindParam(":medico_id", $this->medico_id);
        $stmt->bindParam(":data_consulta", $this->data_consulta);
        $stmt->bindParam(":hora_consulta", $this->hora_consulta);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para ler todas as consultas (com nomes de paciente e médico)
    public function getAll() {
        $query = "SELECT c.id, p.nome as paciente_nome, m.nome as medico_nome, c.data_consulta, c.hora_consulta, c.status
                  FROM " . $this->table_name . " c
                  LEFT JOIN pacientes p ON c.paciente_id = p.id
                  LEFT JOIN medicos m ON c.medico_id = m.id
                  ORDER BY c.data_consulta DESC, c.hora_consulta DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para obter consulta por ID
    public function getById($id) {
        $query = "SELECT id, paciente_id, medico_id, data_consulta, hora_consulta, status FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->id = $row['id'];
            $this->paciente_id = $row['paciente_id'];
            $this->medico_id = $row['medico_id'];
            $this->data_consulta = $row['data_consulta'];
            $this->hora_consulta = $row['hora_consulta'];
            $this->status = $row['status'];
            return true;
        }
        return false;
    }

    // Método para atualizar uma consulta
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET paciente_id=:paciente_id, medico_id=:medico_id, data_consulta=:data_consulta, hora_consulta=:hora_consulta, status=:status WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->paciente_id = htmlspecialchars(strip_tags($this->paciente_id));
        $this->medico_id = htmlspecialchars(strip_tags($this->medico_id));
        $this->data_consulta = htmlspecialchars(strip_tags($this->data_consulta));
        $this->hora_consulta = htmlspecialchars(strip_tags($this->hora_consulta));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':paciente_id', $this->paciente_id);
        $stmt->bindParam(':medico_id', $this->medico_id);
        $stmt->bindParam(':data_consulta', $this->data_consulta);
        $stmt->bindParam(':hora_consulta', $this->hora_consulta);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para deletar uma consulta
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>