<?php
require_once 'funcoes.php';

 $conn = conectarBanco();

     
 if ($_SERVER['REQUEST_METHOD'] === 'POST') { //verificacao se ja foi feito um post
    $acao = $_POST['acao'] ?? '';
 
    if ($acao === 'criarCad') { //Se foi feito um post ele ta vendo qual acao ele ira fazer
        CadastroCliente($_POST ['nomeUsuario'], $_POST['senhaUsuario']);
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro</h1>
    <form method="post" action="cadastro.php">
        <input type="hidden" name="acao" value="criarCad">


        Nome: <input type="text" placeholder="Digite seu nome" name="nomeUsuario">


        Senha: <input type="text" placeholder="Digite sua senha" name="senhaUsuario">

    

        <button type="submit">Cadastrar</button>

    
</form>



</body>
</html>