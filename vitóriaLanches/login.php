<?php
require_once 'funcoes.php';

$conn = conectarBanco();
   
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nomeUsuario'] ?? '';
        $senha = $_POST['senhaUsuario'] ?? '';
        $tipo_selecionado = $_POST['tipo'] ?? '';
    $tipo = LoginCliente($nome, $senha, $tipo_selecionado);
    
    if ($tipo == false) {
        echo "Usuário ou senha incorretos!";
    }
    elseif ($tipo == 'Administrador') {
        echo "Bem vindo administrador";
        header (location: 'gerenciarProd.php');
        exit();
    }
    elseif ($tipo == 'Cliente') {
                echo "Bem vindo $nome";
                header (location:'gerenciarProd.php');
                exit()
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
    <h1>Login</h1>
    <form method="post" action="login.php">
        

        Usuário: <input type="text" placeholder="Digite seu nome" name="nomeUsuario">


        Senha: <input type="password" placeholder="Digite sua senha" name="senhaUsuario">

        <select name="tipo" id="">
            <option value="Cliente">cliente</option>
            <option value="Administrador">Administrador</option>
        </select>

    

        <button type="submit">Entrar</button>

</form>

</body>
</html>