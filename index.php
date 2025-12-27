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

    ?>

    <header>
        <h1>Header</h1>
    </header>

    <main>

        <h2>Escolha seu jogo</h2>


        <table class="listagem">

            <?php

                $busca = $banco->query("SELECT * FROM jogos");
                
                if (!$busca) {

                    echo "Falha na busca: $banco->error";

                } else {

                    if ($busca->num_rows == 0) {
                        
                        echo "<p>Nenhum jogo cadastrado</p>";

                    } else {

                        while ($reg=$busca->fetch_object()) {

                            // Exibir cada jogo (código omitido)
                            echo "<tr><td>$reg->capa</td><td>$reg->nome</td><td>adm</td></tr>";
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