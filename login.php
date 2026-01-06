
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
</head>
<body>
    <link rel="stylesheet" href="estilo/estilo.css">
    <?php
        require_once 'includes/login.php';
        require_once 'includes/banco.php';
        require_once 'includes/funções.php';

        $usuário = $_POST['usuário'] ?? null;
        $senha = $_POST['senha'] ?? null;
        $acao = $_POST['açao'] ?? null;
    ?>

    <main>

    <?php
    if (is_null($usuário) || is_null($senha)) 
    {
        require_once 'formulário de login.php';
    } 
    else {


        $query =
    
        "SELECT usuário, nome, senha, tipo 
        FROM usuários 
        WHERE usuário = '$usuário' LIMIT 1";
    
        $busca = $banco->query($query);
    
        if (!$busca) {
            header("Location: index.php?mensagem=Falha na consulta ao banco de dados&tipo=erro");
        } else {

            $registro = $busca->fetch_object();

            if ($busca->num_rows > 0)

                {

                if (testar_hash($senha, $registro->senha)) 
                {
                    $_SESSION['usuário'] = $registro->usuário ;
                    $_SESSION['nome'] = $registro->nome;
                    $_SESSION['tipo'] = $registro->tipo;
                    sleep(1);
                    header(header: "Location: index.php");
                    mensagem("Usuário: $registro->usuário, Nome: $registro->nome, Tipo: $registro->tipo", 'mensagem');
                    exit();
                }

                else 

                {
                    header(header: "Location: index.php?mensagem=Usuário ou senha incorreta&tipo=aviso");
                    exit();
                }
            } 
            else

            {
                header(header: "Location: index.php?mensagem=Usuário não existe&tipo=aviso");
                exit();
            }
        }
    }
    
    ?>
    </main>

    <?php
        require_once 'rodapé.php';
    ?>
    
</body>
</html>