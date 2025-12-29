<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabeçalho</title>
    <link rel="stylesheet" href="estilo/cabeçalho.css">
</head>
<header>
    <button id="toggle-login" class="toggle-btn" data-target="#login-container" data-hide-text="Ocultar Login/Cadastro" aria-expanded="false">Login/Cadastro</button>

    <div id="login-container" class="login-hidden">
        <form method="POST" action="login.php">

            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <button type="submit" name="acao" value="entrar">Entrar</button>
            <button type="submit" name="acao" value="cadastrar">Cadastrar</button>
        
        </form>
    </div>
</header>

<script src="scripts/toggle-login.js"></script>