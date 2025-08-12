<?php

require_once 'conexao.php';

function lerProd(){
$conexao = conectarBanco();
$sql = "SELECT 
            produtos.nome_prod AS nome_produto, 
            produtos.preco, 
            categorias.nome_cat AS nome_categoria 
        FROM 
            produtos 
        INNER JOIN 
            categorias ON produtos.categoria_id = categorias.id_cat 
        WHERE 
            categorias.id_cat = ?";

$result = $conexao->query($sql); //query é a ação de conectar no banco de dados

$produtos = [];//criando um array vazio
if($result->num_rows > 0){//se o numero de respostar for maior que 0 segue o programa
    while ($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
}

$conexao->close();
return $produtos;
}

function exibirProd(){
    $produtos = lerProd();

    foreach ($produtos as $produto) {
        echo "Produtos:"($produto['nome_produto']);
    }
}