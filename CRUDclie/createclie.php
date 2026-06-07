<?php 
include '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comida = $_POST['nome'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];

    $stmt = $connect->prepare("INSERT INTO clientes (nome, bairro, numero) VALUES (:nome, :bairro, :numero)");
    $stmt->bindValue(":nome", $comida);
    $stmt->bindValue(":bairro", $bairro);
    $stmt->bindValue(":numero", $numero);

    if ($stmt->execute()) {
        header("Location: indexclie.php");
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
    <title>Clientes</title>

</head>
<body>
    <h1> Adicionar novas comidas</h1><br>
     <form action="createclie.php" method="post">
        <label for="name">Adcionar cliente: </label>
        <input type="text" name ="nome" id ="nome"><br>
        <label for="name">Adcionar bairro: </label>
        <input type="name" name ="bairro" id ="nome"><br>
        <label for="name">Adcionar nuemro: </label>
        <input type="number" name ="numero" id ="nome"><br>
        <button type="submit">Salvar</button>
        <a href="indexclie.php"><button type="button">Cancelar</button></a>
     </form>      
</body>
</html>
