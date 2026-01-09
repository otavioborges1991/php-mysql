<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/form.css">
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=keyboard_arrow_left"/>
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/login.php";
        require_once "includes/funções.php";
        require_once 'header.php'; 
    ?>
    <main>
        <?php if (!sessão()): ?>
            <h2>Sessão inativa</h2>
            <p>Efetue Login para acessar seu perfil.</p>
        <?php elseif (!isset($_POST['usuário'])): ?>
            <h2>Seu perfil</h2>
            <form action="user-edit-script.php" method="post">
                <fieldset class="flex-row">
                    <legend>Alterar informações pessoais</legend>
                    <div class="flex-column">
                        <label for="nome">Nome: </label>
                        <label for="usuário">Usuário: </label>                  
                        <label for="senha">Senha: </label>
                        <label for="repita-senha">Repetir Senha: </label>
                        <label for="tipo">Tipo: </label>
                    </div>
                    <div class="flex-column">
                        <input type="text" name="nome" id="nome" maxlength="50" value="<?php echo $_SESSION['nome']?>">
                        <input type="text" name="usuário" id="usuário" maxlength="10" value="<?php echo $_SESSION['usuário']?>">
                        <input type="password" name="senha" id="senha" maxlength="60">
                        <input type="password" name="repetir-senha" id="repetir-senha" maxlength="60">
                        <?php if (tipo('admin')): ?>
                            <select name="tipo" id="tipo">
                                <option value="admin">Administrator</option>
                                <option value="editor">Editor</option>
                                <option value="leitor">Leitor</option>
                            </select>
                        <?php else: ?>
                            <input type="text" name="tipo" id="tipo" readonly value="<?php echo ucfirst($_SESSION['tipo'])?>">
                        <?php endif?>
                        <button type="submit">Enviar</button>
                    </div>
                </fieldset>
            </form>
        <?php endif; ?>
        <button class="material-symbols-outlined botão-voltar" onclick='history.back()'>
            keyboard_arrow_left
        </button>
    </main>
    <?php require_once "footer.php"; ?>    
</body>
</html>