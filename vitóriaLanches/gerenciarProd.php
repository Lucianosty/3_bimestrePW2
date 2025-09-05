<?php
 require_once "funcoes.php";

 $conn = conectarBanco();

 $categorias = LerCategoria($conn);

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';

    if ($acao === 'criar') {
        CadProduto($_POST['nomeprod'],$_POST['descriprod'], $_POST['precoprod'], $_POST['tipoprod']);
    }
}

$produtos = [];

// Verifica se houve envio do formulário de busca
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['TB_TIPO_PRODUTO_ID'])) {
    $id_categoria = $_POST['TB_TIPO_PRODUTO_ID'];
    $produtos = MostrarProd($id_categoria);
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

    <h1>Cadastro de Produtos</h1>
    <form action="gerenciarProd.php" method="post">

    <input type="hidden" name="acao" value="criar">


        <input type="text" placeholder="Digite o nome do produto" name="nomeprod">

        <input type="text" placeholder="Digite a descrição do produto" name="descriprod">

        <input type="number" placeholder="Digite o preço do produto" name="precoprod">



        <select name="tipoprod" id="">
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat['TB_TIPO_PRODUTO_ID'] ?>">
                <?= $cat['TB_TIPO_PRODUTO_DESC'] ?>
            </option>
        <?php endforeach; 
        ?>
    </select>

        <button type="submit">Cadastrar Produto</button>

    </form>



    <h1>Produtos Cadastrados</h1>

    <form action="" method="post">

    <select name="TB_TIPO_PRODUTO_ID" id="">

        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat['TB_TIPO_PRODUTO_ID'] ?>">
                <?= $cat['TB_TIPO_PRODUTO_DESC'] ?>
            </option>
        <?php endforeach; 
        ?>
    </select>
    <button type="submit">Buscar</button>
    </form>

<table>
<tr><th>Produto</th><th>Descrição</th><th>Preço</th><th>Categoria</th></tr>
<?php foreach ($produtos as $umprodutoporvez): ?>
    <tr>
        <td><?= htmlspecialchars($umprodutoporvez['nome_produto']) ?></td>
        <td><?= htmlspecialchars($umprodutoporvez['desc_produto']) ?></td>
        <td>R$ <?= number_format($umprodutoporvez['preco'], 2, ',', '.') ?></td>
        <td><?= htmlspecialchars($umprodutoporvez['nome_categoria']) ?></td>
    </tr>
<?php endforeach; ?>
</table>
</body>
</html>