<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Jogos</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/table.css">
    <link rel="stylesheet" href="style/message.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=editdelete" />
</head>
<body>
    <?php
        require_once 'includes/mensagem.php';
        require_once 'includes/banco.php';
        require_once 'includes/funções.php';
        require_once 'header.php';
    ?>
    <main>
        <h2>Escolha seu jogo</h2>
        <?php
            // Incluir o formulário de busca
            require_once 'search.php';
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
                // contruir_tabela();
                while ($reg=$busca->fetch_object()) {
        require_once 'includes/login.php';

        // Exibir cada jogo (código omitido)
        $t = thumb($reg->capa);
        echo "<table class='listagem'>
            <tr>
                <td><img class='mini' src='$t' alt='Capa do $reg->nome'></td>
                <td>
                    <h2><a href='details.php?cod=$reg->cod'>$reg->nome</a></h2>
                    <h3>Genero: $reg->genero</h3>
                    <h3>Produtora: $reg->produtora</h3>
                    <h3>Nota: $reg->nota/10</h3>
                </td>";

        if (tipo() == 'admin') 
        {
            echo "<td class='adm'>
                <a class='botão-adm' href=''><span class='material-symbols-outlined'>
                edit
                </span></a>
                <a class='botão-adm' href=''><span class='material-symbols-outlined'>
                delete
                </span></a></td>";

        } 

        elseif (tipo() == 'editor') 
        {
            echo "<td class='adm'><a class='botão-adm' href=''><span class='material-symbols-outlined'>
                edit
                </span></a></td>";
        }

        echo "</tr></table>";
    }          
            }
        }
    ?>
    </main>
    <?php require_once 'footer.php'; ?>
</body>

</html>