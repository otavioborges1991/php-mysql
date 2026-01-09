<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar novo usuário</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/form.css">
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=keyboard_arrow_left"/>
</head>
<body>
    <?php
        require_once 'includes/funções.php';
        require_once 'includes/login.php';
        require_once 'header.php';
    ?>
    <main>
        <fieldset>
        <legend>
            <h2>Adicinando novo usuário</h2>
        </legend>
        
        <form id="adicionar-usuário" action="user-add-script.php" method="post">
            
            <div>
                <div class="labels">
                    <label for="nome">Nome:</label>
                    <label for="usuário">Usuário</label>
                    <label for="senha">Senha</label>
                    <label for="repetir-senha">Repita sua Senha</label>
                    <?php
                        if (tipo() === 'admin') {
                            echo "<label for='tipo'>Tipo de Usuário</label>";
                        }
                    ?>
                </div>
                <div class="inputs">
                    <input type="text" required name="nome" id="nome" placeholder="Nome completo" maxlength="50">
                    <input type="text" required name="usuário" id="usuário" placeholder="Nome de usuário" maxlength="10">
                    <input type="password" required name="senha" id="senha" placeholder="Senha" maxlength="10">
                    <input type="password" required name="repetir-senha" id="repetir-senha" placeholder="Repita sua senha" maxlength="10">
                    <?php
                        
                        if (tipo() === 'admin') {
                            echo 
                            "<select required name='tipo' id='tipo'>
                                <option value='admin'>Administrador</option>
                                <option value='editor'>Editor</option>
                                <option value='leitor' selected>Leitor</option>
                            </select>";
                        }

                        $mensagem = $_GET['mensagem'] ?? null;
                        $tipo = $_GET['tipo'] ?? null;
                        if (!is_null($mensagem)) {
                            mensagem($mensagem, $tipo);
                        }
    
                        ?>
                </div>
            </div>

            <button type="submit">Enviar Cadastro</button>

            </form>

        </fieldset>

        <button class="material-symbols-outlined botão-voltar" onclick='history.back()'>
            keyboard_arrow_left
        </button>
    </main>

    <?php 
    require_once "footer.php"; 
    ?>    

</body>
</html>