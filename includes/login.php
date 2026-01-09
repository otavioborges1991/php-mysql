<?php
// arquivo para funções de login

$ação = $_GET['ação'] ?? null;

session_start();
if (!isset($_SESSION['usuário'])) 
    {
    $_SESSION['usuário'] = '';
    $_SESSION['nome'] = '';
    $_SESSION['tipo'] = '';

}

function sair() 
{
    unset($_SESSION['usuário']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);
    session_unset();
    session_destroy();
    header(header: 'Location: index.php');
    exit();
}

function gerar_hash($senha): string 
{
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}

function testar_hash($senha, $hash): bool 
{
    $ok = password_verify($senha, $hash);
    return $ok;
}

function sessão() {
    // retorna true se há uma sessão ativa.
    if (empty($_SESSION['usuário'])) {
        return false;
    } else {
        return true;
    }
}

function tipo($tipo=null) {
    // esta função retorna o tipo de usuário se o $tipo não for definido
    // retorna verdadeiro se o tipo for igual ao $tipo definido, ou false se não for.
    if ($tipo == null) {
        return $_SESSION['tipo'] ?? null;
    } else {
        if ($tipo == $_SESSION['tipo']) {
            return true;
        } else {
            return false;
        }
    }
}