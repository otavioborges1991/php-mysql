<?php
if (!is_null($mensagem)): 
?>
<link rel="stylesheet" href="style/message.css">
<div id="mensagem" class="mensagem-header <?php echo strtolower($tipo); ?>">
    <span class="mensagem-icone"><?php echo $icone; ?></span>
    <span class="mensagem-tipo"><?php echo $tipo; ?></span>
    <p class="mensagem-texto"><?php echo ucfirst($mensagem); ?></p>
    <button class="mensagem-fechar" onclick="document.getElementById('mensagem').remove()">×</button>
</div>
<?php endif; ?>

