<?php

require "../conexao.php";

$id = $_GET['id'];

// Exclui primeiro dos itens do pedido
$sql = "DELETE FROM itens_pedido WHERE produto_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

// Depois exclui o produto
$sql = "DELETE FROM produtos WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: listar_produtos.php");
exit();

?>