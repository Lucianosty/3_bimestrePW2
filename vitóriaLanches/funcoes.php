<?php

    require_once 'conexaoBanco.php';


    function CadastroCliente($nome, $senha){
    $conn = conectarBanco();

    $sql = "INSERT INTO tb_usuarios (TB_USUARIOS_USERNAME, TB_USUARIOS_PASSWORD, TB_USUARIOS_TIPO) VALUES (?, ?, 'cliente')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    header('location: login.php');

    }




    function VerificarUser($nome, $senha)
{
 
    $conn = conectarBanco();
 
 
    $sql = "SELECT * FROM tb_usuarios WHERE TB_USUARIOS_USERNAME = ? AND TB_USUARIOS_PASSWORD = ?";
 
    $stmt= $conn->prepare($sql);
    $stmt->bind_Param("ss" , $nome,$senha);
 
    $stmt->execute();
 
    $result = $stmt->get_result();
 
    $tipo = null;
 
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
 
 
 
    if($usuario['TB_USUARIOS_TIPO'] == 'administrador')
    {
        echo "<form id='loginForm' method='POST' action='index.php'>";
        echo "<input type='hidden' name='tipo' value='administrador'>";
        echo '<script>document.getElementById("loginForm").submit();</script>';
 
        echo "</form>";
       
       
       
    }
    else{
    header("Location: index.php");
}
   
 
   
} else {
    echo "<script>";
    echo "alert('falha no login')  ";
    echo "</script>";
}
 
 
  $stmt->close();
  $conn->close();
 
}
 



    function LerCategoria($conn){
        $sql = "SELECT * FROM tb_tipo_produto";
        $categorias = $conn->query($sql);
    
        $categoria = [];
       
            while ($row = $categorias->fetch_assoc()) {
                $categoria[] = $row;
            }
        
        $conn->close();
        return $categoria;
}

    function CadProduto($nome, $descricao, $preco ,$id){
    $conn = conectarBanco();

    
    $sql = "INSERT INTO tb_produto (TB_PRODUTO_NOME, TB_PRODUTO_DESC, TB_PRODUTO_PRECO_UNIT, TB_TIPO_PRODUTO_ID) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi",$nome, $descricao, $preco ,$id);
    $stmt->execute();

    echo "Produto cadastrado com sucesso!";


    $stmt->close();
    $conn->close();

}

function MostrarProd($id_categoria){
    //abrindo a conexao banco
    $conn = conectarBanco();

        $sql = "SELECT 
        tb_produto.TB_PRODUTO_NOME AS nome_produto, 
        tb_produto.TB_PRODUTO_DESC AS desc_produto,
        tb_produto.TB_PRODUTO_PRECO_UNIT AS preco, 
        tb_tipo_produto.TB_TIPO_PRODUTO_DESC AS nome_categoria 
    FROM 
        tb_produto
    INNER JOIN 
        tb_tipo_produto ON tb_produto.TB_TIPO_PRODUTO_ID = tb_tipo_produto.TB_TIPO_PRODUTO_ID
    Where 
        tb_tipo_produto.TB_TIPO_PRODUTO_ID = ?"; 


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_categoria);
    $stmt->execute();
    $result = $stmt ->get_result();
    

    $produtos = [];


     while ($row = $result->fetch_assoc()) {
     $produtos[] = $row;
    }
    $conn->close();
    $stmt->close();
    return $produtos;

    }





?>


