<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar pedido</title>

</head>
<body>
    <h1> Adicionar novos pedidos</h1><br>
     <form action="createpedi.php" method="post">
        <label for="name">Adcionar nome: </label>
        <input type="text" name ="nome" id ="nome"><br>
        <label for="name">Adcionar pedido: </label>
        <input type="text" name ="pedido" id ="nome"><br>
        <label for="name">Adcionar preço: </label>
        <input type="number" name ="preco" id ="nome"><br>
        <button type="submit">Salvar</button>
        <a href="indexpedi.php"><button type="button">Cancelar</button></a>
     </form>      
</body>
</html>
<?php 
include '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comida = $_POST['nome'];
    $pedido = $_POST['pedido'];
    $preco = $_POST['preco'];

    $stmt = $connect->prepare("INSERT INTO pedidos (nome, pedido, preco) VALUES (:nome, :pedido, :preco)");
    $stmt->bindValue(":nome", $comida);
    $stmt->bindValue(":pedido", $pedido);
    $stmt->bindValue(":preco", $preco);

    if ($stmt->execute()) {
        header("Location: indexpedi.php");
        exit();
    }  else {
        $erro = $stmt->errorInfo();
        echo "Erro ao salvar: " . $erro[2];
    }  
}


?>