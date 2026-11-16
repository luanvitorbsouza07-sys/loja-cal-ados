<?php

require "conexao.php";

$sql = "SELECT * FROM produtos";
$stmt = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
</head>
<body>

<h1>Loja de Calçados</h1>

<?php while ($produto = $stmt->fetch()) { ?>

    <h2><?php echo $produto['nome']; ?></h2>

    <p><?php echo $produto['descricao']; ?></p>

    <p>Preço: R$ <?php echo $produto['preco']; ?></p>

    <p>Estoque: <?php echo $produto['estoque']; ?></p>
    <a href="carrinho.php?id=<?php echo $produto['id']; ?>">
        Adicionar ao Carrinho
    </a>

    <hr>

<?php } ?>

    <hr>

<?php  ?>

</a>

</body>
</html>