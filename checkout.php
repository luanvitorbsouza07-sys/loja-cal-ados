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

        // BAIXA AUTOMÁTICA DO ESTOQUE
        $sql = "UPDATE produtos
                SET estoque = estoque - 1
                WHERE id = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$item['id']]);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h1 class="mb-4">Finalizar Compra</h1>

            <form method="POST">

                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="pagamento" value="PIX" required>
                    <label class="form-check-label">
                        PIX
                    </label>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="pagamento" value="Cartao">
                    <label class="form-check-label">
                        Cartão
                    </label>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="pagamento" value="Boleto">
                    <label class="form-check-label">
                        Boleto
                    </label>
                </div>

                <button type="submit" class="btn btn-success">
                    Confirmar Compra
                </button>

            </form>

        </div>

    <
