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