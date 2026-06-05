<?php
    require_once '../conexao.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $id = $_POST['id'];
    $stmt = $connect->prepare("UPDATE clientes SET nome = :nome, bairro = :bairro, numero = :numero WHERE id = :id");
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":bairro", $bairro);
    $stmt->bindValue(":numero", $numero);
    $stmt->bindValue(":id", $id);

    if($stmt->execute()){
        header("location:indexclie.php");
        exit();
    }else{
        $erro = $stmt->errorInfo();
        echo"Erro ao salvar". $erro[2];
        }
    }

    $id = $_GET['id'] ?? null;
    $stmt = $connect->prepare("SELECT * FROM clientes WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() == 0) { 
        die('Registro não encontrado');
    } else {
        $clie = $stmt->fetch(PDO::FETCH_OBJ);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar cliente</title>
</head>
<body>
    <form action="updateclie.php" method="post">
        <input type="hidden" name="id" value="<?php echo $clie->id; ?>">

        <label for="name">Atualizar clientes</label><br><br>
        Clientes: <input type="text" name="nome" value="<?php echo $clie->nome; ?>"><br>

        Bairro: <input type="text" name="bairro" value="bairro" id="bairro" <?php echo $clie->bairro; ?>><br>

        Número: <input type="number" name="numero" value="<?php echo $clie->numero; ?>"><br>
        <button type="submit">Salvar</button>
        <a href="indexclie.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>