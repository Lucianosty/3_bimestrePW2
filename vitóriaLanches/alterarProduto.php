<!--Página especifica para edição de tarefas--> 
<?php
require_once 'funcoes.php';//abre a requisicao

$id = $_GET['id'] ?? ''; //pega o id
$conn = conectarBanco();

// Busca a tarefa específica no banco de dados
$sql = "SELECT * FROM tb_produtos WHERE TB_PRODUTOS_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$tarefaEditar = $result->fetch_assoc();

$stmt->close();
$conn->close();

if (!$tarefaEditar) {
    header('Location: gerenciarProd.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>
    
    <form method="post" action="gerenciarProd.php">
        <input type="hidden" name="acao" value="atualizarProduto">
        <input type="hidden" name="id" value="<?= $tarefaEditar['id'] ?>">
        
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($tarefaEditar['nome_tar']) ?>" required>
        
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required><?= htmlspecialchars($tarefaEditar['descricao_tar']) ?></textarea>
        
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" value="<?= date('Y-m-d', strtotime($tarefaEditar['data_hora'])) ?>" required>
        
        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" value="<?= date('H:i', strtotime($tarefaEditar['data_hora'])) ?>" required>
        
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Pendente" <?= $tarefaEditar['status_tar'] === 'Pendente' ? 'selected' : '' ?>>Pendente</option>
            <option value="Concluída" <?= $tarefaEditar['status_tar'] === 'Concluída' ? 'selected' : '' ?>>Concluída</option>
            <option value="Atrasada" <?= $tarefaEditar['status_tar'] === 'Atrasada' ? 'selected' : '' ?>>Atrasada</option>
        </select>
        
        <div class="acoes">
            <button type="submit">Atualizar Tarefa</button>
            <a href="index.php">Cancelar</a>
        </div>
    </form>
</body>
</html>