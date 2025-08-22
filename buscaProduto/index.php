<?php 
    require_once 'funcoes.php';

    $conn = conectarBanco();

    $categorias_string = LerCategoria($conn);


    $produtos=[];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_cat'])) {
        $id_categoria = $_POST['id_cat'];
        $produtos = LerProduto($id_categoria, $conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atacadão Vilela</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div></div>
    <h2>Buscar por Categoria com Filtro</h2>
    <form method="post">
        <select name="id_cat">
            <?php foreach ($categorias_string as $cat): ?>
                <option value="<?= $cat['id_cat'] ?>"><?= $cat['nome_cat'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Buscar</button>
    </form>
    <h3>Produtos Encontrados</h3>
    <table>
        <tr><th>Produto</th><th>Preço</th><th>Categoria</th></tr>
        <?php foreach ($produtos as $umprodutoporvez):?>
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