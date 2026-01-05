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

    <?php
    require_once 'includes/login.php';

    if (empty($_SESSION['usuario'])) {
        require_once "formulário de login.php";
    } else {
        require_once 'informações de usuário.php';
    }
    ?>
</header>

<script src="scripts/toggle-login.js"></script>