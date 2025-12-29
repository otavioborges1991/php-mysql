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

        // Cabeçalho da página
        require_once 'cabeçalho.php';
    ?>


    <main>

        <?php
            // Verifica se há uma mensagem de status na URL
            if (isset($_GET['msg'])) {
                // Exibe a mensagem de status
                echo "<p class='msg'>" . htmlspecialchars($_GET['msg']) . "</p>";
            } // não sei pra que isso serve mas o copilot me sugeriu, talvez eu use isso depois.
        ?>


        <h2>Escolha seu jogo</h2>

        <button id="toggle-search" class="toggle-btn" data-target="#search-container" data-hide-text="Ocultar busca" aria-expanded="false">Buscar</button>
        <div id="search-container" class="login-hidden">
        <form method="GET" class="busca-form">
            <input type="text" name="busca" placeholder="Busque por um jogo..." value="<?php echo isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : ''; ?>">
            
            <select name="ordenar">
                <option value="cod" <?php echo isset($_GET['ordenar']) && $_GET['ordenar'] === 'cod' ? 'selected' : ''; ?>>Adicionado</option>
                <option value="nome" <?php echo isset($_GET['ordenar']) && $_GET['ordenar'] === 'nome' ? 'selected' : ''; ?>>Nome</option>
                <option value="genero" <?php echo isset($_GET['ordenar']) && $_GET['ordenar'] === 'genero' ? 'selected' : ''; ?>>Gênero</option>
                <option value="produtora" <?php echo isset($_GET['ordenar']) && $_GET['ordenar'] === 'produtora' ? 'selected' : ''; ?>>Produtora</option>
                <option value="nota" <?php echo isset($_GET['ordenar']) && $_GET['ordenar'] === 'nota' ? 'selected' : ''; ?>>Nota</option>
            </select>
            
            <select name="ordem">
                <option value="DESC" <?php echo isset($_GET['ordem']) && $_GET['ordem'] === 'DESC' ? 'selected' : ''; ?>>Descendente</option>
                <option value="ASC" <?php echo isset($_GET['ordem']) && $_GET['ordem'] === 'ASC' ? 'selected' : ''; ?>>Ascendente</option>
            </select>
            
            <button type="submit">Pesquisar</button>
        </form>
        </div>

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

    <?php require_once 'rodapé.php'; ?>

</body>

</html>