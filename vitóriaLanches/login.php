<?php
require_once 'funcoes.php';

 $conn = conectarBanco();

     
 if ($_SERVER['REQUEST_METHOD'] === 'POST') { //verificacao se ja foi feito um post
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
    <h1>Vitória Lanches</h1>
        <h2>Login</h2>
    <form method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">

        <label for="senha">Senha:</label>
        <input type="text" id="senha" name="senha">

        <button type="submit">Entrar</button>

        <p>Não tem uma conta cadastre por
        <a href="cadastro.php">aqui</a>
        </p>
    </form>
</body>
</html>