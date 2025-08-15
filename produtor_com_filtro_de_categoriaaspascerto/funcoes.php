<?php

require_once 'conexao.php';

function lerCategor(){
$conexao = conectarBanco();
$sql = "SELECT * FROM categoria";
$categorias = $conexao->query($sql);
$categoria = [];


while ($row = $categorias->fetch_assoc()) {
    $categoria[] = $row;
}
$conexao->close();
return $categoria;

}

function lerProd(){
$conexao = conectarBanco();
$sql = "SELECT 
            produtos.nome_prod AS nome_produto, 
            tb_produtos_preco as preco, 
            categoria.nome_cat AS nome_categoria 
        FROM 
            produtos 
        INNER JOIN 
            categoria ON produtos.id_cat = categoria.id_cat ";


        
        $result = $conexao->query($sql);

        $produtos = [];

        while ($row = $result->fetch_assoc()) {
            $produtos[] = $row;
        }
        $conexao->close();
        return $produtos;
}

function CadProduto(){
    $conn = conectarBanco();

    $sql = "INSERT INTO Produtos (nome_prod, TB_preco_produto) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

function mostrarProtudo(){

    $produtos = LerProduto();

}
?>

