<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Consultas</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 900px; margin: 20px auto; }
        h2 { text-align: center; color: #333; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { display: inline-block; padding: 8px 15px; border-radius: 4px; text-decoration: none; color: white; background-color: #007bff; }
        .btn-success { background-color: #28a745; }
        .btn-warning { background-color: #ffc107; color: #333; }
        .btn-danger { background-color: #dc3545; }
        .action-links a { margin-right: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Consultas Agendadas</h2>
        <p>
            <a href="ConsultaController.php?action=create" class="btn btn-success">Agendar Nova Consulta</a>
            <a href="../cancelar_consulta.html" class="btn btn-danger">Cancelar Consulta (D5)</a>
            <a href="../visualizar_consultas.html" class="btn btn-warning">Visualizar Consulta (D4)</a>
        </p>
        <?php if (empty($consultas)): ?>
            <p>Nenhuma consulta agendada ainda.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultas as $consulta): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($consulta['id']); ?></td>
                            <td><?php echo htmlspecialchars($consulta['paciente_nome']); ?></td>
                            <td><?php echo htmlspecialchars($consulta['medico_nome']); ?></td>
                            <td><?php echo htmlspecialchars($consulta['data_consulta']); ?></td>
                            <td><?php echo htmlspecialchars($consulta['hora_consulta']); ?></td>
                            <td><?php echo htmlspecialchars($consulta['status']); ?></td>
                            <td class="action-links">
                                <a href="ConsultaController.php?action=edit&id=<?php echo $consulta['id']; ?>" class="btn">Editar</a>
                                <a href="ConsultaController.php?action=delete&id=<?php echo $consulta['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <p><a href="../index.php" class="btn">Voltar para a Página Inicial</a></p>
    </div>
</body>
</html>