<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar</title>

</head>
<body>
     <form action="createcard.php" method="post">
        <label for="name">Adcionar nova comida</label>
        <input type="text" name ="nome" id ="nome">
        <button type="submit">Salvar</button>
        <a href="indexcard.php"><button type="button">Cancelar</button></a>
     </form>      
</body>
</html>
<?php 
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comida = $_POST['nome'];

    $stmt = $connect->prepare("INSERT INTO cardapio (nome) VALUES (:nome)");

    $stmt->bindValue(":nome", $comida);

    if ($stmt->execute()) {
        header("Location: indexcard.php");
        exit();
    }  else {
        $erro = $stmt->errorInfo();
        echo "Erro ao salvar: " . $erro[2];
    }  
}


?>