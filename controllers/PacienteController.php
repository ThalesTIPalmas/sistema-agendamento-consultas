<?php
// controllers/PacienteController.php

require_once __DIR__ . '/../models/Paciente.php'; // Inclui o modelo Paciente.php

class PacienteController {
    private $pacienteModel;

    public function __construct() {
        $this->pacienteModel = new Paciente(); // Instancia o modelo Paciente
    }

    // Método para listar todos os pacientes
    public function index() {
        $stmt = $this->pacienteModel->getAll(); // Obtém todos os pacientes do banco
        $pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC); // Busca os resultados como array associativo
        include __DIR__ . '/../views/paciente/index.php'; // Inclui a view para exibir a lista
    }

    // Método para exibir o formulário de criação de paciente
    public function create() {
        include __DIR__ . '/../views/paciente/create.php'; // Inclui a view do formulário de criação
    }

    // Método para armazenar um novo paciente (processa o formulário)
    public function store() {
        if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['data_nascimento'], $_POST['telefone'])) {
            $this->pacienteModel->nome = $_POST['nome'];
            $this->pacienteModel->email = $_POST['email'];
            $this->pacienteModel->senha = $_POST['senha'];
            $this->pacienteModel->data_nascimento = $_POST['data_nascimento'];
            $this->pacienteModel->telefone = $_POST['telefone'];

            if ($this->pacienteModel->emailExists()) {
                echo "Erro: E-mail já cadastrado.";
            } elseif ($this->pacienteModel->create()) {
                header('Location: PacienteController.php?action=index'); // Redireciona para a lista de pacientes
            } else {
                echo "Erro ao cadastrar paciente.";
            }
        } else {
            echo "Dados incompletos.";
        }
    }

    // Métodos de edição, atualização e exclusão (podem ser implementados depois)
    public function edit($id) {
        // Lógica para carregar paciente por ID e mostrar formulário de edição
        echo "Funcionalidade de edição de paciente (ID: $id) ainda não implementada.";
    }

    public function update($id) {
        // Lógica para atualizar paciente no banco
        echo "Funcionalidade de atualização de paciente (ID: $id) ainda não implementada.";
    }

    public function delete($id) {
        // Lógica para excluir paciente do banco
        echo "Funcionalidade de exclusão de paciente (ID: $id) ainda não implementada.";
    }
}

// Roteamento
$controller = new PacienteController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if (method_exists($controller, $action)) {
    if ($id) {
        $controller->$action($id);
    } else {
        $controller->$action();
    }
} else {
    echo "Ação inválida!";
}
?>