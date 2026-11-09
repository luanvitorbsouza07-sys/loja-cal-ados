<?php

$host = "127.0.0.1";
$porta = "3307";
$banco = "lojac";
$usuario = "root";
$senha = "";

try {

    $pdo = new PDO(
        "mysql:host=$host;port=$porta;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

} catch (PDOException $erro) {

    die("Erro: " . $erro->getMessage());

}