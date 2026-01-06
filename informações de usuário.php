<link rel="stylesheet" href="estilo/informações do usuário.css">
<div id="user-info">
    <img id="foto-usuário" src="fotos/indisponivel.png" alt="imagem de perfil">
    
    <?php
        echo "Olá " . $_SESSION['nome'] .  ". Você é um " . $_SESSION['tipo'];
    ?>

    <a id="botão-sair" href="sair.php">Sair</a>
</div>