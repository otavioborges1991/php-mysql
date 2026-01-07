<link rel="stylesheet" href="style/user-info.css">
<div id="user-info">
    <img id="foto-usuário" src="fotos/indisponivel.png" alt="imagem de perfil">
    <div id="user-info-div">
        <div id='dados'>
            <?php
                require_once 'includes/login.php';
                echo "Olá " . $_SESSION['nome'];
            ?>
        </div>
        <div id="botões">
            <?php 
                echo "<a class='botão' href='user-data.php'>Meus dados</a>";
                if (tipo() == 'admin') {
                    echo 
                    "<a class='botão' href='user-add.php'>
                    Novo usuário</a>";
                    echo "<a class='botão' href='game-add.php'>Novo jogo</a>";
                }
            ?>
            <a class='botão' href='logout.php'>Sair</a>
        </div>
    </div>
</div>