<?php

function conectarBanco(){
    $host = "127.0.0.1";
    $user = "root";
    $password = "root";
    $database = "merceariaMarcioRodrigo"; //Colocando as informacoes da database na funcao conectar banco

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