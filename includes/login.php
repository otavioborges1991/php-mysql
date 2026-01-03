<?php

function gerar_hash($senha): string {
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}

function testar_hash($senha, $hash): bool {
    $ok = password_verify($senha, $hash);
    return $ok;
}

