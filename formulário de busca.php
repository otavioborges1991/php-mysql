<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Busca</title>
</head>
<button id="toggle-search" class="toggle-btn" data-target="#search-container" data-hide-text="Ocultar busca" aria-expanded="false">Buscar</button>
    <div id="search-container" class="login-hidden">
        <form action="" method="GET" class="busca-form">
            <input type="text" name="busca" placeholder="Busque por um jogo..." value="<?php echo isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : ''; ?>">
            
            <select name="criterio">
                <option value="cod" <?php echo isset($_GET['criterio']) && $_GET['criterio'] === 'cod' ? 'selected' : ''; ?>>Recente</option>
                <option value="nome" <?php echo isset($_GET['criterio']) && $_GET['criterio'] === 'nome' ? 'selected' : ''; ?>>Nome</option>
                <option value="genero" <?php echo isset($_GET['criterio']) && $_GET['criterio'] === 'genero' ? 'selected' : ''; ?>>Gênero</option>
                <option value="produtora" <?php echo isset($_GET['criterio']) && $_GET['criterio'] === 'produtora' ? 'selected' : ''; ?>>Produtora</option>
                <option value="nota" <?php echo isset($_GET['criterio']) && $_GET['criterio'] === 'nota' ? 'selected' : ''; ?>>Nota</option>
            </select>
            
            <select name="ordem">
                <option value="DESC" <?php echo isset($_GET['ordem']) && $_GET['ordem'] === 'DESC' ? 'selected' : ''; ?>>Descendente</option>
                <option value="ASC" <?php echo isset($_GET['ordem']) && $_GET['ordem'] === 'ASC' ? 'selected' : ''; ?>>Ascendente</option>
            </select>
            
            <button type="submit">Pesquisar</button>
        </form>
    </div>
</html>