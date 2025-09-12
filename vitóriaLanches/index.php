<?php
include_once 'funcoes.php';

$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleindex.css">
</head>
<body>

<header>
<ul>
    <li><a href="cadastro.php">Cadastro</a></li>
    <li><a href="login.php">Login</a></li>

    <?php
    if ($tipo == 'administrador') {
        echo '<li><a href="#">Gerenciar pedidos</a></li>';
        echo '<li><a href="#">Relatórios</a></li>';
        echo '<li><a href="gerenciarProd.php">Gerenciar produtos</a></li>';
        echo '<li><a href="#">Clientes</a></li>';
    } else{
        echo "<li><a href='#'>Fazer pedido</a></li>";
    }
    ?>
</ul>
</header>

</body>
</html>
