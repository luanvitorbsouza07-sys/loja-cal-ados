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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-body">

            <h1 class="mb-3">Painel Administrativo</h1>

            <p class="fs-5">
                Bem-vindo, <strong><?php echo $_SESSION["nome"]; ?></strong>
            </p>

            <hr>

            <h3 class="mb-4">Área Administrativa</h3>

            <div class="d-grid gap-3">

                <a href="admin/produtos.php" class="btn btn-primary">
                    Cadastrar Produto
                </a>

                <a href="admin/listar_produtos.php" class="btn btn-success">
                    Listar Produtos
                </a>

                <a href="produtos.php" class="btn btn-info">
                    Ver Loja
                </a>

                <a href="carrinho.php" class="btn btn-warning">
                    Ver Carrinho
                </a>

                <a href="logout.php" class="btn btn-danger">
                    Sair
                </a>

            </div>

        </div>
    </div>

</div>

</body>
</html>