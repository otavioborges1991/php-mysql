<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de jogos</title>
    <link rel="stylesheet" href="estilo/estilo.css">
</head>
<body>

    <?php
        // Conexão com o banco de dados
        require_once 'includes/banco.php';
        // Funções auxiliares
        require_once 'includes/funcoes.php';
    ?>

    <header>
        <h1>Pagina Principal</h1>
    </header>

    <main>

        <h2>Escolha seu jogo</h2>

        <table class="listagem">

            <?php
                $query_mais_novo = 
                "SELECT j.cod, j.nome, j.capa, g.genero AS genero, p.produtora AS produtora
                FROM jogos j 
                JOIN generos g on j.genero = g.cod 
                JOIN produtoras p on j.produtora = p.cod
                ORDER BY cod DESC";


                $busca = $banco->query($query_mais_novo);
                
                if (!$busca) {
                    // em caso de erro na consulta
                    echo "Falha na busca: $banco->error";

                } else {
                    // consulta realizada com sucesso
                    if ($busca->num_rows == 0) {
                        // nenhum jogo cadastrado
                        echo "<p>Nenhum jogo cadastrado</p>";
                    } else {
                        // exibir a lista de jogos
                        while ($reg=$busca->fetch_object()) {
                            // Exibir cada jogo (código omitido)
                            $t = thumb($reg->capa);
                            echo 
                            "<tr>
                                <td><img class='mini' src='$t' alt='Capa do $reg->nome'></td>
                                <td>
                                    <h2><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a></h2>
                                    <h3>$reg->genero</h3>
                                    <h3>$reg->produtora</h3>
                                </td>
                                <td>adm</td>
                            </tr>";
                        }
                    }
                }
            ?>

        </table>
        
    </main>

    <footer>
        Desenvolvido por Otávio Vinícius Borges &copy; 2025
    </footer>

</body>

</html>