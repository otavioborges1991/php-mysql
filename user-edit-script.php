<?php
require_once 'includes/banco.php';
require_once 'includes/login.php';
require_once 'includes/mensagem.php';

$usuário = $_POST['usuário'] ?? null;
$nome = $_POST['nome'] ?? null;
$senha = $_POST['senha'] ?? null;
$repetir_senha = $_POST['repetir-senha'] ?? null;
$tipo= $_POST['tipo'] ?? null;


$usuário_logado = $_SESSION['usuário'] ?? null;

/* 
    $query = 

    "SELECT usuário, nome, senha, tipo from usuários
    WHERE usuário = '$usuário_logado'";

    $busca = $banco->query($query);
    $registro = $busca->fetch_object(); 
*/

$query = 
"UPDATE usuários SET usuário = '$usuário', nome = '$nome'";

if (empty($senha) || is_null($repetir_senha))
{
    $mensagem = 'A senha não foi alterada';
}
elseif ($senha === $repetir_senha) 
{
    $hash = gerar_hash($senha);
    $query .= ", senha = '$hash'";
}
else 
{
    mensagem('enviar', 'As senhas não coincidem', 'erro');
}
$query .= " WHERE usuário = '$usuário_logado'";

if ($banco->query($query)) 
{
    $_SESSION['nome'] = $nome;
    $_SESSION['usuário'] = $usuário;
    $_SESSION['tipo'] = $tipo;
    $mensagem .= "<br>Usuário alterado com sucesso";
    mensagem('enviar', $mensagem, 'sucesso');
}
else 
{
    $mensagem .= '<br>Não foi possivel alterar os dados';
    mensagem('enviar', $mensagem, 'erro');
}