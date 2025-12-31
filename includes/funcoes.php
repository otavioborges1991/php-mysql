<?php 
function thumb($arg) {
    // Função para criar miniaturas de imagens
    $caminho = "fotos/$arg";
    if (is_null($arg) || !file_exists($caminho)) {
        return "fotos/indisponivel.png";
    } else {
        return $caminho;
    }
}

function contruir_tabela() {
    // exibir a lista de jogos
    global $busca;
    while ($reg=$busca->fetch_object()) {
        // Exibir cada jogo (código omitido)
        $t = thumb($reg->capa);
        echo 
        "<tr>
            <td><img class='mini' src='$t' alt='Capa do $reg->nome'></td>
            <td>
                <h2><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a></h2>
                <h3>Genero: $reg->genero</h3>
                <h3>Produtora: $reg->produtora</h3>
                <h3>Nota: $reg->nota/10</h3>
            </td>
            <td>adm</td>
        </tr>";
    }
}