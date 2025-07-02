<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Consulta</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .container { background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { text-align: center; margin-bottom: 20px; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #555; }
        input[type="date"], input[type="time"], select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Agendar Nova Consulta</h2>
        <form action="ConsultaController.php?action=store" method="POST">
            <div class="form-group">
                <label for="paciente_id">Paciente:</label>
                <select id="paciente_id" name="paciente_id" required>
                    <option value="">Selecione um Paciente</option>
                    <?php foreach ($pacientes as $paciente): ?>
                        <option value="<?php echo htmlspecialchars($paciente['id']); ?>">
                            <?php echo htmlspecialchars($paciente['nome']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="medico_id">Médico:</label>
                <select id="medico_id" name="medico_id" required>
                    <option value="">Selecione um Médico</option>
                    <?php foreach ($medicos as $medico): ?>
                        <option value="<?php echo htmlspecialchars($medico['id']); ?>">
                            <?php echo htmlspecialchars($medico['nome']); ?> (<?php echo htmlspecialchars($medico['especialidade']); ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="data_consulta">Data da Consulta:</label>
                <input type="date" id="data_consulta" name="data_consulta" required>
            </div>
            <div class="form-group">
                <label for="hora_consulta">Hora da Consulta:</label>
                <input type="time" id="hora_consulta" name="hora_consulta" required>
            </div>
            <button type="submit">Agendar Consulta</button>
        </form>
        <p style="text-align: center; margin-top: 15px;"><a href="ConsultaController.php?action=index" class="btn" style="background-color: #6c757d;">Voltar para a Lista</a></p>
    </div>
</body>
</html>