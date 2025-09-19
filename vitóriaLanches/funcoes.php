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
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nome, $senha); // Corrigido aqui
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
    
            if ($usuario['TB_USUARIOS_TIPO'] == 'administrador') {
                // Redireciona para gerenciarProd.php
                header("Location: index.php");
                exit();
            } elseif ($usuario['TB_USUARIOS_TIPO'] == 'cliente') {
                // Redireciona para página do cliente (se houver)
                header("Location: index.php");
                exit();
            } else {
                // Tipo de usuário desconhecido
                echo "<script>alert('Tipo de usuário não reconhecido');</script>";
            }
        } else {
            // Falha no login
            echo "<script>alert('Falha no login: usuário ou senha incorretos');</script>";
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

    function CadProd($nome, $descricao, $preco ,$id){
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
    tb_produto.TB_PRODUTO_ID AS id_prod,
    tb_produto.TB_PRODUTO_NOME AS nome_produto, 
    tb_produto.TB_PRODUTO_DESC AS desc_produto,
    tb_produto.TB_PRODUTO_PRECO_UNIT AS preco, 
    tb_tipo_produto.TB_TIPO_PRODUTO_DESC AS nome_categoria 
FROM 
    tb_produto
INNER JOIN 
    tb_tipo_produto ON tb_produto.TB_TIPO_PRODUTO_ID = tb_tipo_produto.TB_TIPO_PRODUTO_ID
WHERE 
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

    function excluirProduto($id){
        $conn = conectarBanco();
        $sql = "DELETE FROM tb_produto WHERE TB_PRODUTO_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo  "<script>alert('Remoção concluida');</script>";
        $stmt->close();
        $conn->close();
        header('location: gerenciarProd.php');

    }

    function criarCategoria($nome){
        $conn = conectarBanco();
        $sql = "INSERT INTO tb_tipo_produto (TB_TIPO_PRODUTO_DESC) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$nome);
        $stmt->execute();
    
        echo "Tipo de produto cadastrado com sucesso!";
    
    
        $stmt->close();
        $conn->close();
        header('location: gerenciarProd.php');
    
    }

    function alterarProduto(){
        $conn = conectarBanco();
        $sql = "UPDATE tb_produtos SET  TB_PRODUTO_NOME = ?, TB_PRODUTO_DESC = ?,  TB_PRODUTO_PRECO_UNIT = ?, TB_TIPO_PRODUTO_ID = ? WHERE TB_PRODUTO_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdii", $dataHora, $dados['titulo'], $dados['descricao'], $dados['status'], $dados['id']);
        $stmt->execute();

        $stmt->close();
        $conn->close();
        header('Location: alterarProduto.php');
        exit(); 

    }
    
    







?>


