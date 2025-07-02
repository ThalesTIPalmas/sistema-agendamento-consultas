<?php
// controllers/ConsultaController.php

require_once __DIR__ . '/../models/Consulta.php'; // Inclui o modelo Consulta.php
require_once __DIR__ . '/../models/Paciente.php'; // Inclui o modelo Paciente.php (para buscar nomes)
require_once __DIR__ . '/../models/Medico.php';   // Inclui o modelo Medico.php (para buscar nomes)

class ConsultaController {
    private $consultaModel;
    private $pacienteModel; // Para buscar o nome do paciente
    private $medicoModel;   // Para buscar o nome do médico

    public function __construct() {
        $this->consultaModel = new Consulta();
        $this->pacienteModel = new Paciente(); // Instancia Paciente
        $this->medicoModel = new Medico();     // Instancia Medico
    }

    // Método para listar todas as consultas
    public function index() {
        $stmt = $this->consultaModel->getAll();
        $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../views/consulta/index.php'; // View para a lista de consultas
    }

    // Método para exibir o formulário de criação de consulta
    public function create() {
        // Precisamos das listas de pacientes e médicos para preencher os selects do formulário
        $pacientes_stmt = $this->pacienteModel->getAll();
        $medicos_stmt = $this->medicoModel->getAll();
        $pacientes = $pacientes_stmt->fetchAll(PDO::FETCH_ASSOC);
        $medicos = $medicos_stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../views/consulta/create.php'; // View do formulário de criação
    }

    // Método para armazenar nova consulta
    public function store() {
        if (isset($_POST['paciente_id'], $_POST['medico_id'], $_POST['data_consulta'], $_POST['hora_consulta'])) {
            $this->consultaModel->paciente_id = $_POST['paciente_id'];
            $this->consultaModel->medico_id = $_POST['medico_id'];
            $this->consultaModel->data_consulta = $_POST['data_consulta'];
            $this->consultaModel->hora_consulta = $_POST['hora_consulta'];

            if ($this->consultaModel->create()) {
                header('Location: ConsultaController.php?action=index');
            } else {
                echo "Erro ao agendar consulta.";
            }
        } else {
            echo "Dados incompletos.";
        }
    }

    // Métodos de edição, atualização e exclusão (podem ser implementados depois)
    public function edit($id) {
        echo "Funcionalidade de edição de consulta (ID: $id) ainda não implementada.";
    }

    public function update($id) {
        echo "Funcionalidade de atualização de consulta (ID: $id) ainda não implementada.";
    }

    public function delete($id) {
        if ($this->consultaModel->getById($id)) { // Tenta carregar a consulta pelo ID
            $this->consultaModel->id = $id; // Define o ID da consulta no modelo
            if ($this->consultaModel->delete()) { // Tenta deletar
                header('Location: ConsultaController.php?action=index'); // Redireciona
            } else {
                echo "Erro ao excluir consulta (ID: $id).";
            }
        } else {
            echo "Consulta com ID $id não encontrada para exclusão.";
        }
    }
}

// Roteamento: Basicamente, ele pega a 'action' da URL e chama o método correspondente no controlador
$controller = new ConsultaController();
$action = $_GET['action'] ?? 'index'; // Pega a ação da URL, se não tiver, usa 'index' por padrão
$id = $_GET['id'] ?? null; // Pega o ID da URL, se tiver

if (method_exists($controller, $action)) {
    if ($id) {
        $controller->$action($id); // Chama o método com o ID
    } else {
        $controller->$action(); // Chama o método sem ID
    }
} else {
    echo "Ação inválida!";
}
?>