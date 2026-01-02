<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do jogo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=keyboard_arrow_left" />
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
                    
                    include "detalhes.php";
                } else {

                    echo "<p>Erro: mais de um jogo com o mesmo código</p>";
                    exit;

                }
            }
            ?>
            
        <img class='botao-voltar' src='icones/icoback.png' alt='Voltar' class='botao' onclick='history.back()'>

    </main>

    <?php include 'rodapé.php'; ?>
</body>
</html>