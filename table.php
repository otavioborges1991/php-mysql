<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Jogos</title>
    <link rel="stylesheet" href="style/table.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=editdelete" />
</head>
<body>
    <?php
    while ($reg=$busca->fetch_object()) {
        require_once 'includes/login.php';

        // Exibir cada jogo (código omitido)
        $t = thumb($reg->capa);
        echo "<table class='listagem'>
            <tr>
                <td><img class='mini' src='$t' alt='Capa do $reg->nome'></td>
                <td>
                    <h2><a href='details.php?cod=$reg->cod'>$reg->nome</a></h2>
                    <h3>Genero: $reg->genero</h3>
                    <h3>Produtora: $reg->produtora</h3>
                    <h3>Nota: $reg->nota/10</h3>
                </td>";

        if (tipo() == 'admin') 
        {
            echo "<td class='adm'>
                <a class='botão-adm' href=''><span class='material-symbols-outlined'>
                edit
                </span></a>
                <a class='botão-adm' href=''><span class='material-symbols-outlined'>
                delete
                </span></a></td>";

        } 

        elseif (tipo() == 'editor') 
        {
            echo "<td class='adm'><a class='botão-adm' href=''><span class='material-symbols-outlined'>
                edit
                </span></a></td>";
        }

        echo "</tr></table>";
    }
    ?>
</body>
</html>