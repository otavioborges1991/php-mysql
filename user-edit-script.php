<?php
require_once 'includes/banco.php';
require_once 'includes/login.php';

$usuário = $_SESSION['usuário'] ?? null;

$query = 

"SELECT usuário, nome, senha, tipo from usuários
WHERE usuário = '$usuário'";

$busca = $banco->query($query);
$registro = $busca->fetch_object();

