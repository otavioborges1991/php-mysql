<!DOCTYPE html>
<html lang="pt-BR">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Footer</title>
        <link rel="stylesheet" href="estilo/rodapé.css">
</head>
<footer>
        <div class="user-info">

                <?php
                $data_atual = date("d/m/Y");
                $ip_usuario = $_SERVER['REMOTE_ADDR'];
                $usuario = get_current_user() ?? 'Visitante';
                
                echo "<p>IP do usuário: $ip_usuario.</p>";
                echo "<p>Usuário: $usuario.</p>";
                echo "<p>Acessado em $data_atual.</p>";
                ?>

        </div>
        <div>
                Desenvolvido por Otávio Vinícius Borges &copy; 2025
        </div>
</footer>
