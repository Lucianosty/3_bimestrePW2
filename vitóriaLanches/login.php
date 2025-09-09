<?php
require_once 'funcoes.php';

$conn = conectarBanco();
   
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nomeUsuario'] ?? '';
        $senha = $_POST['senhaUsuario'] ?? '';
        LoginCliente($nome, $senha);
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
    <h1>Login</h1>
    <form method="post" action="login.php">
        

        Usuário: <input type="text" placeholder="Digite seu nome" name="nomeUsuario">


        Senha: <input type="password" placeholder="Digite sua senha" name="senhaUsuario">

        <button type="submit">Entrar</button>

</form>

</body>
</html>