<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar</title>

</head>
<body>
     <form action="create.php" method="post">
        <label for="name">Adicionar novo funcionário</label>
        <input type="text" name ="funcionário" id ="funcionário">
        <button type="submit">Salvar</button>
        <a href="index.php"><button type="button">Cancelar</button></a>
     </form>      
</body>
</html>
<?php 
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $funcionário = $_POST['funcionário'];

    $stmt = $connect->prepare("INSERT INTO funcionários (nome) VALUES (:nome)");

    $stmt->bindValue(":nome", $funcionario);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    }  else {
        $erro = $stmt->errorInfo();
        echo "Erro ao salvar: " . $erro[2];
    }  
}


?>