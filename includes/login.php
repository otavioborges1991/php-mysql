<?php
// arquivo para funções de login

$ação = $_GET['ação'] ?? null;

session_start();
if (!isset($_SESSION['usuário'])) {
    $_SESSION['usuário'] = '';
    $_SESSION['nome'] = '';
    $_SESSION['tipo'] = '';

}

function sair() {
    unset($_SESSION['usuário']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);
    session_unset();
    session_destroy();
    header(header: 'Location: index.php');
    exit();
}

function cripto($senha):string{
    // mais um nivel de encriptação para nosso sistema.
    $cripto = '';
    for ($posição=0; $posição<strlen($senha); $posição++) {
        $letra = ord($senha[$posição]) + 1;
        $cripto .= chr($letra);
    }

    return $cripto;
}

function gerar_hash($senha): string {
    $txt = cripto($senha);
    $hash = password_hash($txt, PASSWORD_DEFAULT);
    return $hash;
}

function testar_hash($senha, $hash): bool {
    $ok = password_verify($senha, $hash);
    return $ok;
}

function is_logado() {
    if (empty($_SESSION['usuário'])) {
        return false;
    } else {
        return true;
    }
}

function user_type($tipo=null) {
    // esta função retorna o tipo de usuário se o $tipo não for definido
    // retorna verdadeiro se o tipo for igual ao $tipo definido, ou false se não for
    // retorna null se $tipo e $_SESSION['tipo'] não forem definidos
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

