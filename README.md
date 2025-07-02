# Sistema de Agendamento Fácil

## Visão Geral do Projeto
Este projeto é um sistema web simples de *Agendamento de Consultas Médicas*, chamado "Agendamento Fácil". Foi desenvolvido pelos alunos Thales e Kauan Felipe como parte da disciplina de Engenharia de Software da Universidade Federal do Tocantins (UFT).

## Objetivo
O principal objetivo é demonstrar a aplicação de conceitos de Engenharia de Software, com foco especial no fluxo de trabalho colaborativo utilizando o *GitFlow*.

## Informações da Disciplina e Equipe
* *Universidade:* Universidade Federal do Tocantins (UFT)
* *Curso:* Ciências da Computação
* *Disciplina:* Engenharia de Software
* *Semestre:* 2024/1
* *Professor:* Prof. Dr. Edeilson Milhomem Silva
* *Integrantes do Time:*
    * *Thales:* Líder do Projeto e Desenvolvedor Principal (Responsável pelas funcionalidades D1, D3, D5).
    * *Kauan Felipe:* Desenvolvedor (Responsável pelas funcionalidades D2, D4).
    * Jefferson: Monitor e Auxílio Técnico.

## Metodologia e Fluxo de Trabalho (GitFlow)
Os desenvolvedores utilizaram a metodologia *GitFlow* para organizar o desenvolvimento do projeto. Este fluxo visou garantir a colaboração eficiente e a entrega contínua de funcionalidades, com a criação de branches específicas para cada etapa do trabalho.

* *Branches Principais:* main (para releases estáveis) e develop (para o desenvolvimento contínuo).
* *Branches de Feature:* Novas funcionalidades foram desenvolvidas em branches feature/nome-da-funcionalidade, que nasceram da develop e foram mescladas de volta a ela após a conclusão.

*Gráfico de Rede:* O gráfico de rede do repositório demonstra o fluxo de trabalho dos desenvolvedores, com as branches de feature se ramificando e sendo mescladas, comprovando a aplicação do GitFlow.

## Requisitos Implementados (Funcionalidades)

As seguintes funcionalidades foram implementadas no sistema "Agendamento Fácil":

### D1: Cadastro de Médico (Implementado por Thales)
* *Descrição:* Permite que um novo médico crie seu perfil no sistema.
* *Arquivos:* cadastro_medico.html, processa_cadastro_medico.php

### D2: Cadastro de Paciente (Implementado por Kauan Felipe)
* *Descrição:* Permite que um novo paciente crie sua conta para poder agendar consultas.
* *Arquivos:* cadastro_paciente.html, processa_cadastro_paciente.php

### D3: Agendamento de Consulta (Implementado por Thales)
* *Descrição:* Permite que um paciente escolha um médico, uma data e um horário disponível para agendar uma consulta.
* *Arquivos:* agendar_consulta.html, processa_agendamento.php

### D4: Visualização de Consultas (Implementado por Kauan Felipe)
* *Descrição:* Permite que o paciente ou médico visualize a lista de todas as consultas agendadas (agora com dados do banco de dados).
* *Arquivos:* visualizar_consultas.html, simular_visualizacao_consultas.php

### D5: Cancelamento de Consulta (Implementado por Thales)
* *Descrição:* Permite que um paciente ou médico cancele uma consulta previamente agendada (funcionalidade simulada).
* *Arquivos:* cancelar_consulta.html, processa_cancelamento_consulta.php

## Como Rodar o Projeto Localmente
Para executar este projeto em uma máquina local, siga os passos abaixo:

1.  *Pré-requisitos:*
    * *XAMPP:* Deve estar instalado e com os módulos Apache e MySQL iniciados.
    * *PHP:* Integrado ao XAMPP (versão 8.0.30 ou superior).
    * *Git:* Instalado e configurado com a identidade do usuário.
    * Um navegador web moderno (Chrome, Firefox, Edge, etc.)

2.  *Clonar o Repositório:*
    * Abra o Prompt de Comando (CMD) do Windows.
    * Navegue até a pasta htdocs do seu XAMPP (ex: cd C:\xampp\htdocs).
    * Clone o repositório utilizando o comando:
        git clone https://github.com/ThalesTIPalmas/sistema-agendamento-consultas.git
    * Entre na pasta do projeto clonado: cd sistema-agendamento-consultas

3.  *Configurar o Banco de Dados MySQL:*
    * No XAMPP Control Panel, inicie o módulo *MySQL*.
    * Clique no botão *"Admin"* ao lado de MySQL para abrir o phpMyAdmin no navegador.
    * No phpMyAdmin, clique em *"New"* ou *"Bancos de dados"* e crie um banco de dados chamado **maisaude** (tudo minúsculo).
    * Clique no banco de dados maisaude.
    * Clique na aba *"Importar"*.
    * Clique em *"Escolher arquivo"*, navegue até a pasta do projeto (C:\xampp\htdocs\sistema-agendamento-consultas), selecione o arquivo **init_db.sql** e clique em "Executar". As tabelas (medicos, pacientes, consultas) devem ser criadas.

4.  *Iniciar o Servidor Apache (via XAMPP Control Panel):*
    * No XAMPP Control Panel, inicie o módulo *Apache*.

5.  *Acessar as Funcionalidades no Navegador:*
    * Abra seu navegador web.
    * Acesse a página inicial do sistema: http://localhost/sistema-agendamento-consultas/
    * As funcionalidades (Médicos, Pacientes, Consultas, Visualizar Consultas, Cancelar Consulta) podem ser acessadas e testadas a partir dos botões na página inicial.

## Link do Vídeo de Apresentação
(Este link será adicionado aqui após a gravação e upload do vídeo.)

