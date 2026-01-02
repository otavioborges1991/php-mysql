<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Jogos</title>
</head>
<body>
    <?php
    while ($reg=$busca->fetch_object()) {
        // Exibir cada jogo (código omitido)
        $t = thumb($reg->capa);
        echo
        "<table class='listagem'>
            <tr>
                <td><img class='mini' src='$t' alt='Capa do $reg->nome'></td>
                <td>
                    <h2><a href='página de detalhes.php?cod=$reg->cod'>$reg->nome</a></h2>
                    <h3>Genero: $reg->genero</h3>
                    <h3>Produtora: $reg->produtora</h3>
                    <h3>Nota: $reg->nota/10</h3>
                </td>
                <td>adm</td>
            </tr>
        </table>";
    }
    ?>
</body>
</html>