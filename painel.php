<?php

session_start();

if (!isset($_SESSION["id"])) {
    die("Acesso negado");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
</head>
<body>

    <h1>Painel Administrativo</h1>

    <p>Bem-vindo, <?php echo $_SESSION["nome"]; ?></p>

    <hr>

    <h2>Área Administrativa</h2>

    <a href="admin/produtos.php">
        Cadastrar Produto
    </a>

    <br><br>

    <a href="admin/listar_produtos.php">
        Listar Produtos
    </a>

    <br><br>

    <a href="produtos.php">
        Ver Loja
    </a>

    <br><br>

    <a href="carrinho.php">
        Ver Carrinho
    </a>

    <br><br>

    <a href="logout.php">
        Sair
    </a>

</body>
</html>