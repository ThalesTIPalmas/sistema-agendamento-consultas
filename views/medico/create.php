<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Médico</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .container { background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { text-align: center; margin-bottom: 20px; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #555; }
        input[type="text"], input[type="email"], input[type="password"], select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastrar Novo Médico</h2>
        <form action="MedicoController.php?action=store" method="POST">
            <div class="form-group">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha (mínimo 6 caracteres):</label>
                <input type="password" id="senha" name="senha" minlength="6" required>
            </div>
            <div class="form-group">
                <label for="especialidade">Especialidade:</label>
                <select id="especialidade" name="especialidade" required>
                    <option value="">Selecione uma especialidade</option>
                    <option value="clinico_geral">Clínico Geral</option>
                    <option value="pediatra">Pediatra</option>
                    <option value="cardiologista">Cardiologista</option>
                    <option value="dermatologista">Dermatologista</option>
                    <option value="psicologa">Psicóloga</option>
                    <option value="psiquiatra">Psiquiatra</option>
                    <option value="endocrinologista">Endocrinologista</option>
                </select>
            </div>
            <button type="submit">Cadastrar Médico</button>
        </form>
        <p style="text-align: center; margin-top: 15px;"><a href="MedicoController.php?action=index" class="btn" style="background-color: #6c757d;">Voltar para a Lista</a></p>
    </div>
</body>
</html>