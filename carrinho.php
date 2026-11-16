<?php

session_start();
require "conexao.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    $produto = $stmt->fetch();

    $_SESSION['carrinho'][] = $produto;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Carrinho</title>
</head>
<body>

<h1>Meu Carrinho</h1>

<?php

$total = 0;

if (isset($_SESSION['carrinho'])) {

    foreach ($_SESSION['carrinho'] as $item) {

        echo "<h3>" . $item['nome'] . "</h3>";
        echo "<p>Preço: R$ " . $item['preco'] . "</p>";

        $total += $item['preco'];

        echo "<hr>";
    }

    echo "<h2>Total: R$ " . number_format($total, 2, ',', '.') . "</h2>";

} else {

    echo "Carrinho vazio";

}

?>

<br>

<a href="checkout.php">Finalizar Compra</a>

<br><br>

<a href="produtos.php">Voltar aos Produtos</a>

</body>
</html>
