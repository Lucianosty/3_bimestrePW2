<?php 
require_once 'funcoes.php';

// Processa o formulário (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'atualizar') {
    EditProd($_POST); // Chama função para atualizar
    exit(); // Impede o restante do código de ser executado
}

// Se chegou aqui, é GET: carregar dados do produto
$id = $_GET['id_prod'] ?? '';


$conn = conectarBanco();

$sql = "SELECT * FROM tb_produto WHERE TB_PRODUTO_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$produtoEditar = $result->fetch_assoc();

$stmt->close();

// Carrega tipos de produto
$string_tipoProduto = LerCategoria($conn);



if (!$produtoEditar) {
    header('Location: gerenciarProd.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto</h1>
    
    <form method="post" action="editarProd.php">
        <input type="hidden" name="acao" value="atualizar">
        <input type="hidden" name="id_prod" value="<?= $produtoEditar['TB_PRODUTO_ID'] ?>">
        
        <label for="nomeProd">Nome do produto:</label>
        <input type="text" id="nomeProd" name="nomeProd" value="<?= htmlspecialchars($produtoEditar['TB_PRODUTO_NOME']) ?>" required>

        <br><br>
        
        <label for="descricaoProd">Descrição do produto:</label>
        <textarea id="descricaoProd" name="descricaoProd" required><?= htmlspecialchars($produtoEditar['TB_PRODUTO_DESC']) ?></textarea>

        <br><br>

        <label for="preco_unit">Preço unitário:</label>
        <input type="number" step="0.01" id="preco_unit" name="preco_unit" value="<?= htmlspecialchars($produtoEditar['TB_PRODUTO_PRECO_UNIT']) ?>" required>

        <br><br>

        <label for="id_tipoProd_filtro">Tipo do produto:</label>
        <select name="id_tipoProd_filtro" id="id_tipoProd_filtro" required>
            <option value="" disabled>Selecione o tipo do produto</option>
            <?php foreach ($string_tipoProduto as $tipo_prod): ?>
                <option value="<?= $tipo_prod['TB_TIPO_PRODUTO_ID'] ?>"
                    <?= $tipo_prod['TB_TIPO_PRODUTO_ID'] == $produtoEditar['TB_TIPO_PRODUTO_ID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($tipo_prod['TB_TIPO_PRODUTO_DESC']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <div class="acoes">
            <button type="submit">Atualizar Produto</button>
            <a href="gerenciarProd.php">Cancelar</a>
        </div>
    </form>
</body>
</html>
