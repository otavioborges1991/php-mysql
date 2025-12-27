<?php 
    function thumb($arg) {
        // Função para criar miniaturas de imagens
        $caminho = "fotos/$arg";
        if (is_null($arg) || !file_exists($caminho)) {
            return "fotos/indisponivel.png";
        } else {
            return $caminho;
        }
    }