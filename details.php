<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do jogo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/form.css">
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=keyboard_arrow_left"/>
</head>
<body>
<?php include 'header.php'; ?>
<main class="detalhes">
    <?php 
            // Conexão com o banco de dados
            require_once 'includes/banco.php';
            // Funções auxiliares
            require_once 'includes/funções.php';
            $c = $_GET['cod'] ?? 0;
            if (!$c or $c == 0) {
                echo "<p>Jogo inválido</p>";
                exit();
            } 
            $busca = $banco->query("SELECT * FROM jogos WHERE cod=$c");
            if (!$busca) {
                echo "<p>Falha na busca: $banco->error</p>";
            } else {
                if ($busca->num_rows == 0) {
                    echo "<p>Jogo não cadastrado</p>";
                    exit;
                } else if ($busca->num_rows == 1) {
                    $reg = $busca->fetch_object();
                    $foto = thumb($reg->capa);
                    echo "<img id='foto' src=" . $foto . " alt='Foto'>
                    <div id='conteudo-escrito'>
                    <h2 id='nome'>$reg->nome</h2>
                    <div class='inline-block'>
                        <h3>Nota:" . number_format($reg->nota, 1). "/10</h3>
                    </div>
                    <div class='inline-block'>";   
        if (tipo() == 'admin') 
        {
            echo "<td class='adm'>
            <a class='botão-adm' href=''><span class='material-symbols-outlined'>edit</span></a>
            <a class='botão-adm' href=''><span class='material-symbols-outlined'>delete</span></a></td>";
        } 

        elseif (tipo() == 'editor') 
        {
            echo "<td class='adm'><a class='botão-adm' href=''><span class='material-symbols-outlined'>edit</span></a></td>";
        }

        echo "</div><p id='descricao'>";
        echo "$reg->descricao" . "</p>
        </div>";
                } else {

                    echo "<p>Erro: mais de um jogo com o mesmo código</p>";
                    exit;

                }
            }
            ?>
        <button class="material-symbols-outlined botao-voltar" onclick='history.back()'>
            keyboard_arrow_left
        </button>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>