<?php
require_once 'conexao.php';


function LerProduto($id_categoria){
        //abrindo a conexao banco
        $conn = conectarBanco();

            $sql = "SELECT 
            produtos.nome_prod AS nome_produto, 
            produtos.TB_preco_produto AS preco, 
            categorias.nome_cat AS nome_categoria 
        FROM 
            produtos 
        INNER JOIN 
            categorias ON produtos.id_cat = categorias.id_cat
        Where 
            categorias.id_cat = ?"; 


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


   // }
    function LerCategoria(){
            $conn = conectarBanco();
            $sql = "SELECT * FROM categorias";
            $categorias = $conn->query($sql);
        
            $categoria = [];
           
                while ($row = $categorias->fetch_assoc()) {
                    $categoria[] = $row;
                }
            
            $conn->close();
            return $categoria;
    }
    function CadProduto($nome, $preco, $id){
        $conn = conectarBanco();

        
        $sql = "INSERT INTO Produtos (nome_prod, TB_preco_produto, id_cat) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdi",$nome, $preco, $id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
        
    }
?>