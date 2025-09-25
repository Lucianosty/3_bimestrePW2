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
