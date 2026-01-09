<?php 
// arquivo para funções descategorizadas
function thumb($arg): string {
    // Função para criar miniaturas de imagens
    $caminho = "fotos/$arg";
    if (is_null($arg) || !file_exists($caminho)) {
        return "fotos/indisponivel.png";
    } else {
        return $caminho;
    }
}

// Abaixo esta a funçao de contruir tabelas usadas anteriormente
/* function contruir_tabela():void {
    // exibir a lista de jogos
    global $busca;
    while ($reg=$busca->fetch_object()) {
        // Exibir cada jogo (código omitido)
        $t = thumb($reg->capa);
        echo
        "<table class='listagem'>
            <tr>
                <td><img class='mini' src='$t' alt='Capa do $reg->nome'></td>
                <td>
                    <h2><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a></h2>
                    <h3>Genero: $reg->genero</h3>
                    <h3>Produtora: $reg->produtora</h3>
                    <h3>Nota: $reg->nota/10</h3>
                </td>
                <td>adm</td>
            </tr>
        </table>";
    }
} */ 

function construir_query($chave, $criterio, $ordem): string {
    
    $query = 

    "SELECT j.cod, j.nome, j.capa, j.nota AS nota, g.genero AS genero, p.produtora AS produtora
    FROM jogos j 
    JOIN generos g on j.genero = g.cod 
    JOIN produtoras p on j.produtora = p.cod
    ";

    if (!empty($chave)) {

        $query .= " WHERE j.nome like '%$chave%'";
    
    }
    
    $query .= " ORDER BY $criterio $ordem ";

    return $query;
}



