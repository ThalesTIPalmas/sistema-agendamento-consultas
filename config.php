<?php
// config.php - Configurações de conexão com o banco de dados

define('DB_HOST', 'localhost'); // Onde o banco de dados está rodando (seu próprio computador)
define('DB_NAME', 'maisaude');  // Nome do banco de dados que você criou no phpMyAdmin (DEVE SER EXATAMENTE 'maisaude')
define('DB_USER', 'root');      // Usuário padrão do MySQL no XAMPP
define('DB_PASS', '');          // Senha padrão do MySQL no XAMPP (geralmente vazia)

// Configurações para a exibição de erros (útil durante o desenvolvimento)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>