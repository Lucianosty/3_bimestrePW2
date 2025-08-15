<?php

require_once 'conexao.php';

function lerProd(){
$conexao = conectarBanco();
$sql = "SELECT 
            produtos.nome_prod AS nome_produto, 
            tb_produtos_preco, 
            categoria.nome_cat AS nome_categoria 
        FROM 
            produtos 
        INNER JOIN 
            categoria ON produtos.id_cat = categoria.id_cat 
        WHERE 
            categoria.id_cat = ?;";

$result = $conexao->query($sql); //query é a ação de conectar no banco de dados

$produtos = [];//criando um array vazio
if ($result->num_rows > 0) { //se o numero de respostar for maior que 0 segue o programa
    while ($row = $result->fetch_assoc()) { //fazendo uma repeticao, fetch_assosc puxa a primeira linha depois puxa a outra e etc
        $tarefas[] = $row; //colocando a unica linha(row) colocando nas tarefas
    }
}

$conexao->close();
return $produtos;
}

function lerCat(){
$conexao = conectarBanco();
$sql = "SELECT * FROM categoria"
$categoria = $conexao->($sql); //query é a ação de conectar no banco de dados

$categorias = [];//criando um array vazio
if($categorias->num_rows > 0){//se o numero de respostar for maior que 0 segue o programa
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
}
$conexao->close();
return $categoria;
}


function exibirCat(){
    $produtos = lerCat();

    echo [$categoria]
}