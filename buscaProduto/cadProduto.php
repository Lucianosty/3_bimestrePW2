<?php
    require_once 'funcoes.php';

    $conn = conectarBanco();
    $categorias = LerCategoria($conn);


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $acao = $_POST['acao'] ?? '';

        if ($acao === 'criar') {
            CadProduto($_POST['nomeProduto'],$_POST['valorProduto'],$_POST['categoria_id']);
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produtos</title>
</head>

<body>

    <h1>Cadastro de produto</h1>
    <form action="cadProduto.php" method="post">
    <input type="hidden" name="acao" value="criar">
        <input type="text" id="nome_prod" name="nomeProduto" placeholder="Digite o produto que deseja adicionar"
            required>
            <br>
        <input type="number" id="TB_preco_produto" name="valorProduto" placeholder="Digite o valor do produto" required>

    
        <select name="categoria_id">
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['id_cat'] ?>"><?= $cat['nome_cat'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Cadastrar</button>
        
        


    </form>
</body>

        <a href="index.php">Voltar</a>

</html>