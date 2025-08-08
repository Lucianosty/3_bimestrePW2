<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Marcio Rodrigo</title>
</head>
<body>
    <form action="index.php" method="post">
        <h2>Busca de produtos do Mercado Marcio Rodrigo</h2>
        <input type="hidden" nome="acao" value="pesquisar">

        <label for="categoria">Categorias dos produtos:</label>
        
        <select name="" id="">
            <option value="tecnologia">Tecnologia</option>
            <option value="doces">Doces</option>
            <option value="bebidas">Bebidas</option>
            </select>

        <button type="submit">Procurar produtos</button>
    </form>

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