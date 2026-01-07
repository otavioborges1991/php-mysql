<link rel="stylesheet" href="estilo/informações do usuário.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=user_attributes" />


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
                echo "<a class='botão' href=''>Meus dados</a>";
                if (tipo() == 'admin') {
                    echo 
                    "<a class='botão' href=''>
                    Novo usuário</a>";
                    echo "<a class='botão' href=''>Novo jogo</a>";
                }
            ?>

            <a class='botão' href='sair.php'>Sair</a>

        </div>

    </div>


</div>