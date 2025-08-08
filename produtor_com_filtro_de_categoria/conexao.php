<?php

function conectarBanco(){
    $host = "127.0.0.1";
    $user = "root";
    $password = "root";
    $database = "mercado_marcio_rodrigo"; //Colocando as informacoes da database na funcao conectar banco

//criacao da conexao
$conexao = new mysqli($host, $user, $password, $database);

if($conexao->connect_error){ //vendo se ta dando erro na conexao
    die("Erro na conexão: " .$conexao->connect_error);
}

//negocio para evitar problemas com caracteres especiais
$conexao->set_charset("utf8mb4");

return $conexao;//devolvendo a informacao para a conexao

}
?>