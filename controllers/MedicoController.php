<?php
// controllers/MedicoController.php

require_once __DIR__ . '/../models/Medico.php'; // Inclui o modelo Medico.php

class MedicoController {
    private $medicoModel;

    public function __construct() {
        $this->medicoModel = new Medico(); // Instancia o modelo Medico
    }

    // Método para listar todos os médicos
    public function index() {
        $stmt = $this->medicoModel->getAll(); // Obtém todos os médicos do banco
        $medicos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Busca os resultados como array associativo
        include __DIR__ . '/../views/medico/index.php'; // Inclui a view para exibir a lista
    }

    // Método para exibir o formulário de criação de médico
    public function create() {
        include __DIR__ . '/../views/medico/create.php'; // Inclui a view do formulário de criação
    }

    // Método para armazenar um novo médico (processa o formulário)
    public function store() {
        if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['especialidade'])) {
            $this->medicoModel->nome = $_POST['nome'];
            $this->medicoModel->email = $_POST['email'];
            $this->medicoModel->senha = $_POST['senha'];
            $this->medicoModel->especialidade = $_POST['especialidade'];

            if ($this->medicoModel->emailExists()) {
                echo "Erro: E-mail já cadastrado.";
            } elseif ($this->medicoModel->create()) {
                header('Location: MedicoController.php?action=index'); // Redireciona para a lista de médicos
            } else {
                echo "Erro ao cadastrar médico.";
            }
        } else {
            echo "Dados incompletos.";
        }
    }

    // Métodos de edição, atualização e exclusão (podem ser implementados depois)
    public function edit($id) {
        // Lógica para carregar médico por ID e mostrar formulário de edição
        echo "Funcionalidade de edição de médico (ID: $id) ainda não implementada.";
    }

    public function update($id) {
        // Lógica para atualizar médico no banco
        echo "Funcionalidade de atualização de médico (ID: $id) ainda não implementada.";
    }

    public function delete($id) {
        // Lógica para excluir médico do banco
        echo "Funcionalidade de exclusão de médico (ID: $id) ainda não implementada.";
    }
}

// Roteamento: Basicamente, ele pega a 'action' da URL e chama o método correspondente no controlador
$controller = new MedicoController();
$action = $_GET['action'] ?? 'index'; // Pega a ação da URL, se não tiver, usa 'index' por padrão
$id = $_GET['id'] ?? null; // Pega o ID da URL, se tiver

if (method_exists($controller, $action)) { // Verifica se o método existe na classe
    if ($id) {
        $controller->$action($id); // Chama o método com o ID
    } else {
        $controller->$action(); // Chama o método sem ID
    }
} else {
    echo "Ação inválida!"; // Se a ação não existir
}
?>