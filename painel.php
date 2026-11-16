<?php

session_start();
require "conexao.php";

if (!isset($_SESSION["id"])) {
    die("Acesso negado");
}

$sql = "SELECT * FROM produtos";
$stmt = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
</head>
<body>

<h1>Painel Administrativo</h1>

<h2>Produtos Cadastrados</h2>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Preço</th>
    <th>Estoque</th>
</tr>

<?php while($produto = $stmt->fetch()) { ?>

<tr>
    <td><?= $produto['id'] ?></td>
    <td><?= $produto['nome'] ?></td>
    <td>R$ <?= $produto['preco'] ?></td>
    <td><?= $produto['estoque'] ?></td>
</tr>

<?php } ?>

</table>

<br>

<a href="produtos.php">Ver Loja</a>

</body>
</html>