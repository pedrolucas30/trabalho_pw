<?php
    require_once '../conexao.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $pedidos = $_POST['pedidos'];
    $preco = $_POST['preco'];
    $id = $_POST['id'];
    $stmt = $connect->prepare("UPDATE pedidos SET nome = :nome, pedido = :pedido, preco = :preco WHERE id = :id");
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":pedido", $pedidos);
    $stmt->bindValue(":preco", $preco);
    $stmt->bindValue(":id", $id);

    if($stmt->execute()){
        header("location:indexpedi.php");
        exit();
    }else{
        $erro = $stmt->errorInfo();
        echo"Erro ao salvar". $erro[2];
        }
    }

    $id = $_GET['id'] ?? null;
    $stmt = $connect->prepare("SELECT * FROM pedidos WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() == 0) { 
        die('Registro não encontrado');
    } else {
        $card = $stmt->fetch(PDO::FETCH_OBJ);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar pedidos</title>
</head>
<body>
    <form action="updatepedi.php" method="post">
        <input type="hidden" name="id" value="<?php echo $card->id; ?>">

        <label for="name">Atualizar pedidos</label><br><br>
        Comida: <input type="text" name="nome" value="<?php echo $card->nome; ?>"><br>

        Pedidos: <input type="text" name="pedidos" value="<?php echo $card->pedido; ?>" id="pedidos" ><br>

        Preço: <input type="number" name="preco" value="<?php echo $card->preco; ?>"><br>
        <button type="submit">Salvar</button>
        <a href="indexpedi.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>