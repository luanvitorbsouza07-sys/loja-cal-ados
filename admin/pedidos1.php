<?php

session_start();

if (!isset($_SESSION["id"])) {
    die("Acesso negado");
}

require "../conexao.php";

$sql = "SELECT * FROM pedidos ORDER BY id DESC";
$stmt = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1 class="mb-4">Pedidos Realizados</h1>

    <table class="table table-bordered table-striped">

        <thead>

            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Total</th>
                <th>Pagamento</th>
                <th>Data</th>
            </tr>

        </thead>

        <tbody>

        <?php while($pedido = $stmt->fetch()) { ?>

            <tr>

                <td><?php echo $pedido["id"]; ?></td>

                <td><?php echo $pedido["usuario_id"]; ?></td>

                <td>R$ <?php echo number_format($pedido["valor_total"], 2, ",", "."); ?></td>

                <td><?php echo $pedido["pagamento"]; ?></td>

                <td><?php echo $pedido["data_pedido"]; ?></td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

    <a href="../painel.php" class="btn btn-primary">
        Voltar ao Painel
    </a>

</div>

</body>
</html>