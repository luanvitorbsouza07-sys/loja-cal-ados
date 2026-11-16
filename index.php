<?php
require_once("conexao.php");

$sql = "SELECT * FROM produtos";
$stmt = $pdo->query($sql);
$produtos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Loja de Calçados</title>
</head>
<body>

<h1>Loja de Calçados</h1>

<a href="login.php">Login</a>
<a href="cadastro.php">Cadastro</a>

<hr>

<?php foreach($produtos as $produto): ?>

    <h3><?= $produto['nome'] ?></h3>

    <p><?= $produto['descricao'] ?></p>

    <p>
        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
    </p>

    <hr>

<?php endforeach; ?>

</body>
</html>