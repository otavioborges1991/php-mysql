<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=editdelete" />

</head>
<body>
    <?php
    require_once "includes/funções.php";
    require_once "includes/banco.php";
    ?>
    <img id='foto' src='<?php echo $foto?>' alt='Foto'>
    <div id='conteudo-escrito'>
    <h2 id='nome'><?php echo $reg->nome?></h2>
    <div class="inline-block">
        <h3>Nota: <?php echo number_format($reg->nota, 1)?>/10</h3>
    </div>
    <div class="inline-block">
        <?php

        if (tipo() == 'admin') 
        {
            echo "<td class='adm'>
            <a class='botão-adm' href=''><span class='material-symbols-outlined'>edit</span></a>
            <a class='botão-adm' href=''><span class='material-symbols-outlined'>delete</span></a></td>";

        } 

        elseif (tipo() == 'editor') 
        {
            echo 
            "<td class='adm'><a class='botão-adm' href=''><span class='material-symbols-outlined'>edit</span></a></td>";
        }

        ?>
        
    </div>
    <p id='descricao'><?php echo "$reg->descricao"?></p>
    
    </div>
</body>
</html>