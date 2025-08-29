<?php
require_once 'funcoes.php';

 $conn = conectarBanco();

     
 if ($_SERVER['REQUEST_METHOD'] === 'POST') { //verificacao se ja foi feito um posto
    $acao = $_POST['acao'] ?? '';
 
    if ($acao === 'criar') { //Se foi feito um post ele ta vendo qual acao ele ira fazer
        criarTarefa($_POST);
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
    <h1>Cadastros</h1>
    <form method="post" action="acao">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">

        <label for="senha">Senha:</label>
        <input type="text" id="senha" name="senha">

        <a href="login.php">Voltar</a>

        <button type="submit">Continuar Cadastro</button>
</form>
</body>
</html>