<?php 
require_once 'funcoes.php';


$conn = conectarBanco();

// Carrega categorias para ambos os formulários
$categorias = LerCategoria($conn);

$produtos = [];

// Verifica se houve envio do formulário de busca
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['TB_TIPO_PRODUTO_ID'])) {
    $id_categoria = $_POST['TB_TIPO_PRODUTO_ID'];
    $produtos = LerProduto($id_categoria, $conn);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mercearia Marcio Rodrigo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Cadastro de Produto</h1>
<form action="gerenciarProd.php" method="post">
    <input type="hidden" name="acao" value="criar">
    
    <input type="text" name="nomeProduto" placeholder="Digite o produto que deseja adicionar" required><br>
    <input type="number" name="valorProduto" placeholder="Digite o valor do produto" required><br>

    <select name="TB_TIPO_PRODUTO_ID">
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat['TB_TIPO_PRODUTO_ID'] ?>">
                <?= $cat['TB_TIPO_PRODUTO_DESC'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Cadastrar</button>
</form>

<hr>

<h2>Buscar por Categoria com Filtro</h2>
<form method="post">
    <select name="TB_TIPO_PRODUTO_ID">
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat['TB_TIPO_PRODUTO_ID'] ?>">
                <?= $cat['TB_TIPO_PRODUTO_DESC'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Buscar</button>
</form>

<h3>Produtos Encontrados</h3>
<table>
    <tr><th>Produto</th><th>Preço</th><th>Categoria</th></tr>
    <?php foreach ($produtos as $umprodutoporvez): ?>
        <tr>
            <td><?= htmlspecialchars($umprodutoporvez['nome_produto']) ?></td>
            <td>R$ <?= number_format($umprodutoporvez['preco'], 2, ',', '.') ?></td>
            <td><?= htmlspecialchars($umprodutoporvez['nome_categoria']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="cadProduto.php">Cadastrar</a>

</body>
</html>
