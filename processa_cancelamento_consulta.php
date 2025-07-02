<?php
// Este arquivo PHP vai "receber" os dados do formulário de cancelamento de consulta.

echo "<!DOCTYPE html>
<html lang=\"pt-BR\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Processamento de Cancelamento</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .message { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .back-link { display: block; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['id_consulta'])) {
        echo "<div class='message error'>Erro: O ID da Consulta é obrigatório para cancelar.</div>";
    } else {
        $id_consulta = htmlspecialchars($_POST['id_consulta']);
        $email_confirmacao = htmlspecialchars($_POST['email_confirmacao'] ?? ''); // Opcional

        // ***** IMPORTANTE PARA ESTA ATIVIDADE *****
        // POR ENQUANTO: Não vamos interagir com um banco de dados real.
        // Apenas vamos simular o cancelamento.

        // Simula a verificação se a consulta existe (poderia vir de um banco de dados)
        $consulta_existe = ($id_consulta % 2 == 0); // Simula que IDs pares existem, ímpares não

        if ($consulta_existe) {
            echo "<div class='message'><h2>Cancelamento de Consulta Confirmado!</h2>";
            echo "<p>A consulta com **ID:** " . $id_consulta . " foi cancelada com sucesso.</p>";
            if (!empty($email_confirmacao)) {
                echo "<p>Uma confirmação foi enviada para: " . $email_confirmacao . "</p>";
            }
            echo "<p><em>(Em um sistema real, este cancelamento seria registrado no banco de dados.)</em></p>";
            echo "</div>";
        } else {
            echo "<div class='message error'><h2>Erro ao Cancelar Consulta</h2>";
            echo "<p>A consulta com **ID:** " . $id_consulta . " não foi encontrada ou não pode ser cancelada.</p>";
            echo "<p><em>(Verifique o ID da consulta e tente novamente.)</em></p>";
            echo "</div>";
        }
    }
} else {
    echo "<div class='message error'>Método de requisição inválido. Por favor, acesse via formulário.</div>";
}

echo "<a href='cancelar_consulta.html' class='back-link'>Voltar para o formulário de cancelamento</a>";
echo "</body>
</html>";
?>