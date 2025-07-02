-- Criação da tabela medicos
CREATE TABLE medicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    especialidade VARCHAR(255) NOT NULL
);

-- Criação da tabela pacientes
CREATE TABLE pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_nascimento DATE NOT NULL,
    telefone VARCHAR(20)
);

-- Criação da tabela consultas
CREATE TABLE consultas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT NOT NULL,
    medico_id INT NOT NULL,
    data_consulta DATE NOT NULL,
    hora_consulta TIME NOT NULL,
    status VARCHAR(50) DEFAULT 'Agendada',
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id),
    FOREIGN KEY (medico_id) REFERENCES medicos(id)
);

-- Inserção de dados de exemplo (opcional)
INSERT INTO medicos (nome, email, senha, especialidade) VALUES
('Dr. Carlos Silva', 'carlos.silva@medico.com', 'senha_hash_medico_1', 'Clínico Geral'),
('Dra. Ana Costa', 'ana.costa@medico.com', 'senha_hash_medico_2', 'Pediatra');

INSERT INTO pacientes (nome, email, senha, data_nascimento, telefone) VALUES
('Maria Oliveira', 'maria.o@paciente.com', 'senha_hash_paciente_1', '1990-05-10', '99999-8888'),
('João Santos', 'joao.s@paciente.com', 'senha_hash_paciente_2', '1985-11-20', '99999-7777');

-- Exemplo de inserção de consulta (ajuste os IDs conforme necessário)
-- INSERT INTO consultas (paciente_id, medico_id, data_consulta, hora_consulta) VALUES
-- (1, 1, '2025-07-10', '10:00:00');