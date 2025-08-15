<?php
require_once 'conexao.php';

// Define a variável com valor do POST (se existir)
$id_categoria = $_POST['id_categoria'] ?? '';

// Função para ler produtos da categoria selecionada
function lerProd($id_categoria) {
    $conn = conectarBanco();

    $sql = "SELECT
                produtos.nome_produto,
                produtos.preco_produto,
                categorias.nome_categoria
            FROM
                produtos
            INNER JOIN
                categorias ON produtos.id_categoria_fk = categorias.id_categoria
            WHERE
                categorias.id_categoria = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_categoria);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $produtos = $resultado->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    $conn->close();

    return $produtos;
}

// Função para exibir os produtos
function exibirProd($id_categoria) {
    $produtos = lerProd($id_categoria);

    if (count($produtos) === 0) {
        echo "<p>Nenhum produto encontrado para essa categoria.</p>";
        return;
    }

    foreach ($produtos as $produto) {
        echo "Produto: " . htmlspecialchars($produto['nome_produto']) . "<br>";
        echo "Preço: R$ " . number_format($produto['preco_produto'], 2, ',', '.') . "<br>";
        echo "Categoria: " . htmlspecialchars($produto['nome_categoria']) . "<hr>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Marcio Rodrigo</title>
</head>
<body>

    <form method="post">
        <select name="id_categoria">
            <option value="">-- Selecione uma categoria --</option>
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['id_categoria'] ?>" <?= ($id_categoria == $cat['id_categoria']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['nome_categoria']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Buscar</button>
    </form>

    <a href="criar.php">Adicionar Produtos</a>

    <hr>

    <?php
    if ($id_categoria) {
        exibirProd($id_categoria);
    } else {
        echo "<p>Selecione uma categoria para ver os produtos.</p>";
    }
    ?>

</body>
</html>
