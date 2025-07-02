<?php
// Este arquivo PHP vai "receber" os dados do formulário HTML de cadastro de médico

echo "<!DOCTYPE html>
<html lang=\"pt-BR\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Processamento de Cadastro de Médico</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .message { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .back-link { display: block; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['especialidade'])) {
        echo "<div class='message error'>Erro: Todos os campos são obrigatórios.</div>";
    } elseif (strlen($_POST['senha']) < 6) {
        echo "<div class='message error'>Erro: A senha deve ter no mínimo 6 caracteres.</div>";
    } else {
        $nome = htmlspecialchars($_POST['nome']);
        $email = htmlspecialchars($_POST['email']);
        $senha = htmlspecialchars($_POST['senha']); // Em um sistema real, a senha seria hash (criptografada)
        $especialidade = htmlspecialchars($_POST['especialidade']);

        // ***** IMPORTANTE PARA ESTA ATIVIDADE *****
        // POR ENQUANTO: Não vamos salvar em banco de dados ou verificar email único.
        // Apenas vamos exibir os dados recebidos para simular o cadastro.

        echo "<div class='message'><h2>Cadastro de Médico Realizado com Sucesso!</h2>";
        echo "<p><strong>Nome:</strong> " . $nome . "</p>";
        echo "<p><strong>E-mail:</strong> " . $email . "</p>";
        echo "<p><strong>Especialidade:</strong> " . $especialidade . "</p>";
        echo "<p><em>(Senha não exibida por segurança)</em></p>";
        echo "</div>";
    }
} else {
    echo "<div class='message error'>Método de requisição inválido. Por favor, acesse via formulário.</div>";
}

echo "<a href='cadastro_medico.html' class='back-link'>Voltar para o formulário de cadastro</a>";
echo "</body>
</html>";
?>