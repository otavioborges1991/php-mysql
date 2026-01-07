<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Jogos</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <?php
        // Conexão com o banco de dados
        require_once 'includes/banco.php';
        // Funções auxiliares
        require_once 'includes/funções.php';
        // Cabeçalho da página
        require_once 'header.php';
    ?>
    <main>
        <h2>Escolha seu jogo</h2>
        <?php
            // Incluir o formulário de busca
            require_once 'search.php';
        ?>
    <?php
        $mensagem = $_GET['mensagem'] ?? null;
        $tipo = $_GET['tipo'] ?? null;
        if (!is_null($mensagem)) {
            mensagem($mensagem, $tipo);
        }
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
                // contruir_tabela();
                require_once "./table.php";               
            }
        }
    ?>
    </main>
    <?php require_once 'footer.php'; ?>
</body>

</html>