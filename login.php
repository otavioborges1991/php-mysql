
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

        $usuario = $_POST['usuario'] ?? null;
        $senha = $_POST['senha'] ?? null;
        $acao = $_POST['açao'] ?? null;
    ?>

    <main>

    <?php
    if (is_null($usuario) || is_null($senha)) 
    {
        require_once 'formulário de login.php';
    } 
    else {


        $query =
    
        "SELECT usuario, nome, senha, tipo 
        FROM usuarios 
        WHERE usuario = '$usuario' LIMIT 1";
    
        $busca = $banco->query($query);
    
        if (!$busca) {
            header("Location: index.php?mensagem=Falha na consulta ao banco de dados&tipo=erro");
        } else {

            $registro = $busca->fetch_object();
             
            if ($busca->num_rows > 0) {
                if (testar_hash($senha, $registro->senha)) {
                    $_SESSION['usuario'] = $registro->usuario;
                    $_SESSION['nome'] = $registro->nome;
                    $_SESSION['tipo'] = $registro->senha;
                    header(header: "Location: index.php?mensagem=Logado com sucesso&tipo=sucesso");
                } else {
                    header("Location: index.php?mensagem=Usuário ou senha incorreta&tipo=aviso");
                }
            } else {
                header(header: "Location: index.php?mensagem=Usuário não existe&tipo=aviso");
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