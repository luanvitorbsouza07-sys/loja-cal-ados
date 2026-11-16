<?php

session_start();
require "../conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $estoque = $_POST["estoque"];
    $categoria_id = $_POST["categoria_id"];

    $sql = "INSERT INTO produtos
    (nome, descricao, preco, estoque, categoria_id)
    VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $nome,
        $descricao,
        $preco,
        $estoque,
        $categoria_id
    ]);

    echo "<p>Produto cadastrado com sucesso!</p>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
</head>
<body>

<h1>Cadastrar Produto</h1>

<form method="POST">

    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Descrição:</label><br>
    <textarea name="descricao"></textarea><br><br>

    <label>Preço:</label><br>
    <input type="number" step="0.01" name="preco" required><br><br>

    <label>Estoque:</label><br>
    <input type="number" name="estoque" required><br><br>

    <label>Categoria:</label><br>

    <select name="categoria_id">
        <option value="1">Chinelos</option>
        <option value="2">Sandalias</option>
        <option value="3">Tenis</option>
    </select>

    <br><br>

    <button type="submit">
        Cadastrar Produto
    </button>

</form>

</body>
</html>