<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "lojac";

$con = mysqli_connect($host, $user, $pass, $db);

if ($con) {
    echo "Conectou!";
} else {
    echo "Erro";
}

?>