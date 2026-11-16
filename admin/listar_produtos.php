<?php

require "../conexao.php";

$sql = "SELECT * FROM produtos";
$stmt = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos Cadastrados</title>
</head>
<body>

<h1>Produtos Cadastrados</h1>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Preço</th>
    <th>Estoque</th>
    <th>Ação</th>
</tr>

<?php while($produto = $stmt->fetch()) { ?>

<tr>
    <td><?php echo $produto['id']; ?></td>
    <td><?php echo $produto['nome']; ?></td>
    <td>R$ <?php echo $produto['preco']; ?></td>
    <td><?php echo $produto['estoque']; ?></td>
    <td>
        <a href="excluir_produto.php?id=<?php echo $produto['id']; ?>">
            Excluir
        </a>
    </td>
</tr>

<?php } ?>

</table>

<br><br>

<a href="produtos.php">Cadastrar Novo Produto</a>

</body>
</html>