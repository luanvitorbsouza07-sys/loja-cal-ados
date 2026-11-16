<?php

session_start();

if (!isset($_SESSION['id'])) {
    die("Acesso negado");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
</head>
<body>

    <h1>Painel Administrativo</h1>

    <p>Bem-vindo, <?php echo $_SESSION['nome']; ?></p>

    <hr>

    <a href="produtos.php">Produtos</a><br><br>

    <a href="carrinho.php">Carrinho</a><br><br>

    <a href="logout.php">Sair</a>

</body>
</html>