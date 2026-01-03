<?php

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
    $ok = password_verify(cripto($senha), $hash);
    return $ok;
}