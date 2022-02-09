<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "CRUD";

$pdo = new PDO('mysql:host=localhost;dbname=CRUD', $usuario, $senha); //informacao do banco de dados para conectar
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//PDO::ATTR_ERRMODE = atributo usado para reportar erros + valor =PDO::ERRMODE_EXCEPTION 
?>