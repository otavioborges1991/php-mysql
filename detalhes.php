<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
</head>
<body>
    <?php
    require_once "includes/funções.php";
    require_once "includes/banco.php";
    ?>
    <img id='foto' src='<?php echo $foto?>' alt='Foto'>
    <div id='conteudo-escrito'>
    <h2 id='nome'><?php echo $reg->nome?></h2>
    <h3>Nota: <?php echo number_format($reg->nota, 1)?>/10</h3>
    <p id='descricao'><?php echo "$reg->descricao"?></p>
    <div class='adm'>ADM</div>
    </div>
</body>
</html>