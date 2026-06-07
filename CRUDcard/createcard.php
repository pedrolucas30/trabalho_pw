<?php 
include '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comida = $_POST['nome'];
    $preco = $_POST['preco'];
    $quant = $_POST['quant'];

    $stmt = $connect->prepare("INSERT INTO cardapio (nome, preco, quantidade) VALUES (:nome, :preco, :quantidade)");
    $stmt->bindValue(":nome", $comida);
    $stmt->bindValue(":preco", $preco);
    $stmt->bindValue(":quantidade", $quant);

    if ($stmt->execute()) {
        header("Location: indexcard.php");
        exit();
    }  else {
        $erro = $stmt->errorInfo();
        echo "Erro ao salvar: " . $erro[2];
    }  
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar</title>

</head>
<body>
    <h1> Adicionar novas comidas</h1><br>
     <form action="createcard.php" method="post">
        <label for="name">Adcionar comida: </label>
        <input type="text" name ="nome" id ="nome"><br>
        <label for="name">Adcionar preço: </label>
        <input type="number" name ="preco" id ="nome"><br>
        <label for="name">Adcionar quantidade: </label>
        <input type="number" name ="quant" id ="nome"><br>
        <button type="submit">Salvar</button>
        <a href="indexcard.php"><button type="button">Cancelar</button></a>
     </form>      
</body>
</html>
