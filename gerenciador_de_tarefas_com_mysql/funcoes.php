<?php

require_once 'conexao.php'; //colocando a conexao nas funcoes

function lerTarefas() {
    $conn = conectarBanco(); //abrindo a conexao do banco
    $sql = "SELECT * FROM Tarefas ORDER BY data_hora ASC"; //fazendo uma unica string 
    $result = $conn->query($sql); //guardando ela no sql

    $tarefas = []; //criando um array vazio 
    if ($result->num_rows > 0) { //se o numero de respostar for maior que 0 segue o programa
        while ($row = $result->fetch_assoc()) { //fazendo uma repeticao, fetch_assosc puxa a primeira linha depois puxa a outra e etc
            $tarefas[] = $row; //colocando a unica linha(row) colocando nas tarefas
        }
    }
    $conn->close();
    return $tarefas; //fecha a conexao
}


function criarTarefa($dados) { //criando o crirar tarefas recebendo um parametro
    $conn = conectarBanco(); //Abrir a conexao de novo
    $sql = "INSERT INTO Tarefas (data_hora, nome_tar, descricao_tar, status_tar) VALUES (?, ?, ?, ?)"; //ele vai colocar insert dentro da tabela  com as informacoes, ja as interrogacoes ele coloca pra posicionar
    $stmt = $conn->prepare($sql); //é uma preparacao da biblioteca do my sql data
//ela ta organinzado a data praticamente
    $dataHora = $dados['data'] . ' ' . $dados['hora']; 
    $stmt->bind_param("ssss", $dataHora, $dados['titulo'], $dados['descricao'], $dados['status']);
    $stmt->execute(); //E logo depois ele executa

    $stmt->close(); //fechando os dois
    $conn->close();
}

function exibirTarefas() {
    $tarefas = lerTarefas(); //puxar as informacoes do ler tarefa

    foreach ($tarefas as $tarefa) { //repeticao para criar as divs fazendo um elemento por vez 
        $classeStatus = strtolower(str_replace('í', 'i', $tarefa['status_tar'])); // Remove acento para classe CSS
        echo "<div class='tarefa $classeStatus'>";
        echo "<h3>" . htmlspecialchars($tarefa['nome_tar']) . "</h3>";
        echo "<p><strong>Descrição:</strong> " . htmlspecialchars($tarefa['descricao_tar']) . "</p>";
        echo "<p><strong>Data e Hora:</strong> " . htmlspecialchars($tarefa['data_hora']) . "</p>";
        echo "<p><strong>Status:</strong> " . htmlspecialchars($tarefa['status_tar']) . "</p>";

        echo "<div class='acoes'>";
        echo "<form method='post' action='index.php' style='display:inline;'>";
        echo "<input type='hidden' name='acao' value='excluir'>";
        echo "<input type='hidden' name='id' value='" . $tarefa['id'] . "'>";
        echo "<button type='submit'>Excluir</button>";
        echo "</form>";

        // Botão para editar
        echo "<form method='get' action='editar.php' style='display:inline;'>";
        echo "<input type='hidden' name='id' value='" . $tarefa['id'] . "'>";
        echo "<button type='submit'>Editar</button>";
        echo "</form>";

        echo "</div>";
        echo "</div>";
    }
}


function atualizarTarefa($dados) {
    $conn = conectarBanco();
    $sql = "UPDATE Tarefas SET data_hora = ?, nome_tar = ?, descricao_tar = ?, status_tar = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $dataHora = $dados['data'] . ' ' . $dados['hora'];
    $stmt->bind_param("ssssi", $dataHora, $dados['titulo'], $dados['descricao'], $dados['status'], $dados['id']);
    $stmt->execute();

    $stmt->close();
    $conn->close();
    header('Location: index.php');
    exit(); //sai da funcao
}

function excluirTarefa($id) {
    $conn = conectarBanco();
    $sql = "DELETE FROM Tarefas WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
    header('Location: index.php');
    exit();
}