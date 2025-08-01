<?php
// Função para conectar ao banco de dados MySQL
function conectarBanco() { //funcao conectar banco de dados
    $host = "localhost";
    $user = "root";
    $password = "root";
    $database = "gerenciador_tarefas"; //colocando as informacoes no banco de dados

    // Criação da conexão
    $conn = new mysqli($host, $user, $password, $database); //objeto de conexao o mysqli com a variavel

    // Verifica se houve erro na conexão
    if ($conn->connect_error) { //se existe algum erro na conexao
        die("Erro na conexão: " . $conn->connect_error); //se ela existir ele vai encerrar e mostrar na tela
    }

    // Define o charset para evitar problemas com caracteres especiais
    $conn->set_charset("utf8mb4"); //para colocar acento e talz

    return $conn; //depois devolvemos as informacoes para a conexao
}
?>