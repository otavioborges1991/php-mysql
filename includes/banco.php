<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "bd_games";

$banco = new mysqli($host, $user, $password, $database);

$banco->set_charset("utf8");
$banco->query("SET NAMES 'utf8'");
$banco->query("SET character_set_connection=utf8");
$banco->query("SET character_set_client=utf8");
$banco->query("SET character_set_results=utf8");

if ($banco->connect_errno) {
    echo "Falha na conexão: (" . $banco->connect_errno . ") " . $banco->connect_error;
    die;
}
