<!DOCTYPE html>
<html lang="pt-br">
    
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/form.css">
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=keyboard_arrow_left"/>
</head>

<body>

    <?php
        require_once "includes/banco.php";
        require_once "includes/login.php";
        require_once "includes/funções.php";
        require_once 'header.php'; 
    ?>

    <main>
        <h2>Modelo</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt cupiditate voluptatum dolores nostrum pariatur rerum ex, quae quibusdam vitae distinctio non molestias voluptatibus sit reiciendis quam excepturi totam eius ipsa!</p>
        <button class="material-symbols-outlined botão-voltar" onclick='history.back()'>
            keyboard_arrow_left
        </button>
    </main>

    <?php require_once "footer.php"; ?>    

</body>
</html>