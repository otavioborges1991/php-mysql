<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
    <link rel="stylesheet" href="estilo/estilo.css">
</head>
<body>
    <?php
        // Conexão com o banco de dados
        require_once 'includes/banco.php';
        // Funções auxiliares
        require_once 'includes/funcoes.php';
    ?>

    <?php include 'cabeçalho.php'; ?>

    <main class="detalhes">
        <?php 
            $c = $_GET['cod'] ?? 0;

            if (!$c or $c == 0) {

                echo "<p>Jogo inválido</p>";
                exit;

            } 

            $busca = $banco->query("SELECT * FROM jogos WHERE cod=$c");
            
            if (!$busca) {

                echo "<p>Falha na busca: $banco->error</p>";
                exit;

            } else {

                if ($busca->num_rows == 0) {

                    echo "<p>Jogo não cadastrado</p>";
                    exit;

                } else if ($busca->num_rows == 1) {

                    $reg = $busca->fetch_object();
                    $foto = thumb($reg->capa);
                    
                    echo "<img id='foto' src='$foto' alt='Foto'>";
                    echo "<div id='conteudo-escrito'>";
                    echo "<h2 id='nome'>$reg->nome</h2>";
                    echo "<h3>Nota: " . number_format($reg->nota, 1) . "/10</h3>";
                    echo "<p id='descricao'>$reg->descricao</p>";
                    echo "<div class='adm'>ADM</div>";
                    echo "</div>";
                    echo "<img class='botao-voltar' src='icones/icoback.png' alt='Voltar' class='botao' onclick='history.back()'>";

                } else {

                    echo "<p>Erro: mais de um jogo com o mesmo código</p>";
                    exit;

                }
            }
            ?>


    </main>

    <?php include 'rodapé.php'; ?>
</body>
</html>