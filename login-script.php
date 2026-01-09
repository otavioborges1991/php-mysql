<?php
    require_once 'includes/login.php';
    require_once 'includes/banco.php';
    require_once 'includes/funções.php';
    require_once 'includes/mensagem.php';

    $usuário = $_POST['usuário'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $ação = $_POST['açao'] ?? null;

if ($ação == 'entrar')
{
    if (is_null($usuário) || is_null($senha)) 
    {
        require_once 'login-form.php';
    } 
    else {


        $query =
    
        "SELECT usuário, nome, senha, tipo 
        FROM usuários 
        WHERE usuário = '$usuário' LIMIT 1";
    
        $busca = $banco->query($query);
    
        if (!$busca) {
            mensagem("enviar", "Falha na consulta ao banco de dados", "erro");
            exit();
        } else {

            $registro = $busca->fetch_object();

            if ($busca->num_rows > 0)

                {

                if (testar_hash($senha, $registro->senha)) 
                {
                    $_SESSION['usuário'] = $registro->usuário ;
                    $_SESSION['nome'] = $registro->nome;
                    $_SESSION['tipo'] = $registro->tipo;
                    header("Location: index.php");
                    exit();
                }

                else 

                {
                    mensagem("enviar", "Usuário ou senha incorreta", "aviso");
                    exit();
                }
            } 
            else

            {
                mensagem("enviar", "Usuário não existe", "aviso");
                exit();
            }
        }
    }
} else if ($ação == 'cadastrar') {
    header(header: 'Location: user-add.php');
} else {
    mensagem("enviar", "Ação inválida! como você fez isso?", "erro");
    exit();
}