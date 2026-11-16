<?php

require "conexao.php";

$busca = "";

if (isset($_GET["busca"])) {

    $busca = $_GET["busca"];

    $sql = "SELECT * FROM produtos WHERE nome LIKE ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(["%$busca%"]);

} else {

    $sql = "SELECT * FROM produtos";

    $stmt = $pdo->query($sql);

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Loja de Calçados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h1 class="text-center mb-4">
        Loja de Calçados
    </h1>

    <form method="GET" class="mb-4">

        <div class="input-group">

            <input
                type="text"
                name="busca"
                class="form-control"
                placeholder="Buscar produto">

            <button
                type="submit"
                class="btn btn-primary">
                Buscar
            </button>

        </div>

    </form>

    <div class="row">

        <?php while ($produto = $stmt->fetch()) { ?>

            <div class="col-md-4 mb-4">

                <div class="card shadow h-100">

                    <?php if (!empty($produto['imagem'])) { ?>

                        <img
                            src="<?php echo $produto['imagem']; ?>"
                            class="card-img-top"
                            alt="<?php echo $produto['nome']; ?>"
                            style="height:300px; object-fit:cover;">

                    <?php } ?>

                    <div class="card-body">

                        <h4 class="card-title">
                            <?php echo $produto['nome']; ?>
                        </h4>

                        <p class="card-text">
                            <?php echo $produto['descricao']; ?>
                        </p>

                        <p>
                            <strong>
                                R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                            </strong>
                        </p>

                        <p>
                            Estoque: <?php echo $produto['estoque']; ?>
                        </p>

                        <a
                            href="carrinho.php?id=<?php echo $produto['id']; ?>"
                            class="btn btn-success">

                            Adicionar ao Carrinho

                        </a>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

    <a href="index.php" class="btn btn-secondary">
        Voltar ao Início
    </a>

</div>

</body>
</html>