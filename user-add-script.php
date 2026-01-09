<?php
require_once 'includes/banco.php';
require_once 'includes/login.php';

$nome = $_POST['nome'] ?? null;
$usuário = $_POST['usuário'] ?? null;
$senha = $_POST['senha'] ?? null;
$repetir_senha = $_POST['repetir-senha'] ?? null;
$tipo = $_POST['tipo'] ?? null;

if ($senha === $repetir_senha) 
{
    if (is_null($usuário) || is_null($nome)) 
    {
        header('Location: user-add.php?mensagem=Todos os dados são obrigatórios&tipo=aviso');
    } else 
    {
        $hash = gerar_hash($senha);
        $query = 
        "INSERT INTO usuários (usuário, nome, senha, tipo)
        VALUES('$usuário', '$nome', '$hash', '$tipo')";
        if ($banco->query($query)) {
            header('Location: user-add.php?mensagem=Novo usuário criado&tipo=sucesso');
        }
        else 
        {
            header('Location: user-add.php?mensagem=Nâo foi possivel criar o usuário&tipo=erro');
        }

    }
} 
else 
{
    header('Location: user-add.php?mensagem=As senhas não coincidem&tipo=aviso');
}