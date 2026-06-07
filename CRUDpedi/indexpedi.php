<?php 
    include '../conexao.php';

    if(isset($_GET['delete_id'])) {
        $id_delete = $_GET['delete_id'];

        $stmt = $connect->prepare("DELETE FROM pedidos WHERE id = :id ");
        $stmt->bindValue(':id', $id_delete);

        if ($stmt->execute()) {
            header("Location: indexpedi.php");
            exit();
        }
    }


    $query = $connect->prepare("SELECT * FROM pedidos");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
   <a href="createpedi.php"><button> Adicionar pedidos </button></a>
    <h1>Pedidos</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Pedido</th>
                <th>Preço</th>
                <th>Botões</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['pedido']; ?></td>
                <td><?php echo $item['preco']; ?></td>
                <td>
                    <a href="updatepedi.php?id=<?php echo $item['id']; ?>"><button>Editar</button></a>
                    <a href="indexpedi.php?delete_id=<?php echo $item['id'];  ?> "onclick="return confirm('Deseja mesmo excluir')">
                    <button>Excluir</button></a>


                </td>
            
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../index.php"><button type="button">Voltar</button></a>
</body>
</html>
