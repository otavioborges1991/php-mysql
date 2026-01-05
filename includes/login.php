<?php
// arquivo para funções de login

$ação = $_GET['ação'] ?? null;

session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = '';
    $_SESSION['nome'] = '';
    $_SESSION['tipo'] = '';

}

function sair() {
    unset($_SESSION['usuario']);
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
