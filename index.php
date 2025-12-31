<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Jogos</title>
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

        <?php
            // Incluir o formulário de busca
            require_once 'formulario-busca.php';
        ?>

    <?php

        // Estes 2 tem que mudar dinamicamente de acordo com o formulário de busca
        $criterio = $_GET['criterio'] ?? "cod";
        $ordem = $_GET['ordem'] ?? "ASC";
        $chave = $_GET['busca'] ?? "";

        $busca = $banco->query(construir_query($chave, $criterio, $ordem));
        
        if (!$busca) {
            // em caso de erro na consulta
            echo "Falha na busca: $banco->error";

        } else {
            // consulta realizada com sucesso
            if ($busca->num_rows == 0) {
                // nenhum jogo cadastrado
                echo "<p>Nenhum jogo cadastrado</p>";
            } else {
                // Diferente de como ensinado no curso, estou chamando uma função para criar a tabela
                contruir_tabela();                   
            }
        }
    ?>

    </main>

    <?php require_once 'rodapé.php'; ?>

</body>

</html>