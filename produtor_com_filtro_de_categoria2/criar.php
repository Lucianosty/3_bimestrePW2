<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
</head>
<body>
    <form action="index.php" method="post">
        <h2>Adicionar Produto do mercado marcio rodrigo</h2>

        <label for="nome">Nome do produto:</label>
        <input type="text" id="nome" name="nome">

        <label for="">Categoria do produto:</label>
        <select name="categoria_id">
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['id'] ?>"><?= $cat['nome'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="">Preço do produto:</label>
        <input type="number">
    </form>
    </form>
</body>
</html>