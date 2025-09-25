<?php
include_once 'funcoes.php';

$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitoria Lanches</title>
    <link rel="stylesheet" href="styleindex.css">
</head>
<body>

    <style>
        
body {
    font-family: 'Roboto', sans-serif;
    background-color: #F9F9F9;
    color: #000000;
    line-height: 1.6;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}


header {
    background-color: #E32219;
    padding: 7px 0;
}

header ul {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 30px;
}

header ul li a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    padding: 8px 15px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

header ul li a:hover {
    background-color: #e65c00;
}


main {
    flex: 1;
    padding: 40px 20px;
    max-width: 900px;
    margin: 0 auto;
    background-color: #fff;
}

main h2 {
    color: #ff6600;
    margin-bottom: 20px;
}

/* Rodapé */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 15px 0;
    font-size: 14px;
}


    </style>

<header>
<ul>
    <li><a href="index.php?pagina=cadastro">Cadastrar</a></li>
    <li><a href="index.php?pagina=login">Entrar</a></li>

    <?php
    if ($tipo == 'administrador') {
        echo '<li><a href="#">Gerenciar pedidos</a></li>';
        echo '<li><a href="#">Relatórios</a></li>';
        echo '<li><a href="gerenciarProd.php">Gerenciar produtos</a></li>';
        echo '<li><a href="#">Clientes</a></li>';
    } else{
        echo "<li><a href='index.php?pagina=fazerPedidoFalso'>Fazer pedido</a></li>";
    }
    ?>
</ul>
</header>

<main>
<?php
if (isset($_GET['pagina'])) {
$pagina = $_GET['pagina'] . '.php';
if (file_exists($pagina)) {
include($pagina);
} else {
echo "<p>Página não encontrada.</p>";
}
} else {
echo "<h2>Bem-vindo ao Vitoria Lanches!</h2>
<p>Entre ou se cadastre, e depois escolha uma opção no menu acima.</p>";
}
?>
</main>

<footer>
<p>&copy; 2025 Vitoria Lanches </p>
</footer>

</body>
</html>
