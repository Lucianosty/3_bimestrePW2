<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tarefas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Gestor de Tarefas</h1>
    
    <!-- Formulário -->
    <form method="post" action="index.php">
        <h2>Nova Tarefa</h2>
        <input type="hidden" name="acao" value="criar">
        
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>
        
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>
        
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" required>
        
        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" required>
        
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Pendente">Pendente</option>
            <option value="Concluída">Concluída</option>
            <option value="Atrasada">Atrasada</option>
        </select>
        
        <button type="submit">Salvar Tarefa</button>
    </form>
    
      <h2>Suas Tarefas</h2>
    <?php
        include 'funcoes.php';
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $acao = $_POST['acao'] ?? '';
            
            if ($acao === 'criar') {
                criarTarefa($_POST);
            } elseif ($acao === 'atualizar') {
                atualizarTarefa($_POST);
            } elseif ($acao === 'excluir') {
                excluirTarefa($_POST['id']);
            }
        }
        
       
        exibirTarefas();
    ?>


</body>
</html>