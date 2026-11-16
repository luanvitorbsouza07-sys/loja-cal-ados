<?php

session_start();
require "conexao.php";

if (!isset($_SESSION['id'])) {
    die("Faça login para finalizar a compra.");
}

if (!isset($_SESSION['carrinho'])) {
    die("Carrinho vazio.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario_id = $_SESSION['id'];
    $pagamento = $_POST['pagamento'];

    $total = 0;

    foreach ($_SESSION['carrinho'] as $item) {
        $total += $item['preco'];
    }

    $sql = "INSERT INTO pedidos (usuario_id, valor_total, pagamento)
            VALUES (?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario_id, $total, $pagamento]);

    $pedido_id = $pdo->lastInsertId();

    foreach ($_SESSION['carrinho'] as $item) {

        $sql = "INSERT INTO itens_pedido
                (pedido_id, produto_id, preco)
                VALUES (?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $pedido_id,
            $item['id'],
            $item['preco']
        ]);
    }

    unset($_SESSION['carrinho']);

    echo "<h2>Compra realizada com sucesso!</h2>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>

<h1>Finalizar Compra</h1>

<form method="POST">

    <label>
        <input type="radio" name="pagamento" value="PIX" required>
        PIX
    </label>

    <br><br>

    <label>
        <input type="radio" name="pagamento" value="Cartao">
        Cartão
    </label>

    <br><br>

    <label>
        <input type="radio" name="pagamento" value="Boleto">
        Boleto
    </label>

    <br><br>

    <button type="submit">
        Confirmar Compra
    </button>

</form>

</body>
</html>