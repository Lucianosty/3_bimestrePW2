<?php
require_once "funcoes.php";

$stringdecategoriahorrorosa = lerCategor();
$stringdeprodutohorroroso = lerProd();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Marcio Rodrigo</title>
</head>
<body>
<h2>Buscar por Categoria com Filtro</h2>
    <form method="post">
        <select name="categoria_id">
            <?php foreach ($stringdecategoriahorrorosa as $cat): ?>
                <option value="<?= $cat['id'] ?>"><?= $cat['nome_cat'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Buscar</button>
    </form>

    <a href="criar.php">Adicionar Produtos</a>

    <h3>Produtos Encontrados</h3>
        <table>
            <tr><th>Produto</th><th>Preço</th><th>Categoria</th></tr>
            <?php foreach ($stringdeprodutohorroroso as $umprodutoporvez): ?>
                <tr>
                    <td><?= htmlspecialchars($umprodutoporvez['nome_produto']) ?></td>
                    <td>R$ <?= number_format($umprodutoporvez['preco'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($umprodutoporvez['nome_categoria']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

</body>
</html>