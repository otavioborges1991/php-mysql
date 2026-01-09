<?php

function mensagem($operação, $mensagem=null, $tipo=null) 
{
    if ($operação == 'receber') {
        mensagemReceber();
    } else if ($operação == 'enviar') {
        mensagemEnviar($mensagem, $tipo);
    }
}
function mensagemReceber(): void {
    $mensagem = $_GET['mensagem'] ?? null;
    $tipo = ucfirst($_GET['tipo'] ?? null);


    if ($tipo != 'Erro' && $tipo != 'Aviso' && $tipo != 'Sucesso' && $tipo != 'Mensagem') {
        $tipo = 'Mensagem';
    }

    $icone = icone($tipo);

    include "message.php";
}

function mensagemEnviar($mensagem, $tipo) {
    $pagina = $_SERVER['HTTP_REFERER'] ?? 'index.php';
    $separador = strpos($pagina, '?') !== false ? '&' : '?';
    header("Location: $pagina{$separador}mensagem=$mensagem&tipo=$tipo");
    exit();
}

function icone($tipo) {
    // função para escolher o icone a ser usado no sistema de mensagem
    switch ($tipo) {
        case "Erro":
            $icone = "💀";
            break;
        case "Aviso":
            $icone = "⚠️";
            break;
        case "Sucesso":
            $icone = "✔️";
            break;
        default:
            $icone = "💬";
            break;
        }

        return $icone;
}