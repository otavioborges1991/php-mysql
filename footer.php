<!DOCTYPE html>
<html lang="pt-BR">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rodapé</title>
        <link rel="stylesheet" href="style/footer.css">
</head>
<footer>
        <?php
                $data_atual = date("d/m/Y");
                $ip_usuário = $_SERVER['REMOTE_ADDR'];
                $usuário = get_current_user() ?? 'Visitante';

                echo "<p>IP do usuário: $ip_usuário.</p>";
                echo "<p>Usuário: $usuário.</p>";
                echo "<p>Acessado em $data_atual.</p>";
        ?>
        Desenvolvido por Otávio Vinícius Borges &copy; 2025
</footer>
