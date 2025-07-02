<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }
        .container {
            margin-top: 100px;
        }
        .btn-action {
            font-size: 1.5rem;
            padding: 20px 0;
            margin-bottom: 20px;
            height: 120px; /* Uniform button height */
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,.1); /* Subtle shadow */
        }
        .btn-action:hover {
            box-shadow: 0 6px 12px rgba(0,0,0,.15);
            transform: translateY(-2px); /* Slight lift effect */
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1 class="mb-5 display-4">Sistema de Agendamento de Consultas</h1>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="controllers/MedicoController.php?action=index" class="btn btn-success btn-action w-100">Médicos</a>
            </div>
            <div class="col-md-4">
                <a href="controllers/PacienteController.php?action=index" class="btn btn-primary btn-action w-100">Pacientes</a>
            </div>
            <div class="col-md-4">
                <a href="controllers/ConsultaController.php?action=index" class="btn btn-warning btn-action w-100">Consultas</a>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <a href="visualizar_consultas.html" class="btn btn-info btn-action w-100 text-white">Visualizar Consultas (Simulado)</a>
            </div>
            <div class="col-md-6">
                <a href="cancelar_consulta.html" class="btn btn-danger btn-action w-100">Cancelar Consulta (Simulado)</a>
            </div>
        </div>

        <p class="mt-5 text-muted">
            Este projeto é uma demonstração de Engenharia de Software e GitFlow.
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>