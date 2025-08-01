
CREATE DATABASE IF NOT EXISTS gerenciador_tarefas;
USE Gerenciador_tarefas;

DROP TABLE IF EXISTS Tarefas;


CREATE TABLE Tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_hora DATETIME,
    nome_tar CHAR(100) NOT NULL,
    descricao_tar CHAR(255) NOT NULL,
    status_tar ENUM('Pendente', 'Atrasada', 'Concluída') NOT NULL
);

INSERT INTO Tarefas (data_hora, nome_tar, descricao_tar, status_tar) VALUES ('2025-06-01 00:00:00', "Começo das tarefas", "Descrição da tarefa inicial", 'Concluída');
INSERT INTO Tarefas (data_hora, nome_tar, descricao_tar, status_tar) VALUES ('2025-12-20 00:00:00', "Última tarefas", "Descrição da tarefa Final", 'Pendente');