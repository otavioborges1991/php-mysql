<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem Arrastável</title>
</head>
<body>
    <div id='mensagem'>
        <div id='mensagemdrag' class="<?php echo $tipo?>">
            <?php
                 echo "<span>$icone</span>";
                 echo ucfirst($tipo);
            ?>
            <button onclick="document.getElementById('mensagem').remove()">x</button>
        </div>
        <p><?php echo ucfirst($mensagem)?></p>
    </div>
</body>
</html>

