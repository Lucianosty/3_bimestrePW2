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
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['id'] ?>"><?= $cat['nome'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Buscar</button>
    </form>

    <a href="criar.php">Adicionar Produtos</a>

    <?php
    include 'funcoes.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){ //verifica se ja foi feito um posto
        $acao = $_POST['acao'] ?? '';

        if($acao === 'pesquisar') {
            pesquisarProd($_POST);
        }
    }
        exibirProd();

    ?>
</body>
</html>