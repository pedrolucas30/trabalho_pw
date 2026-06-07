<?php 
    include '../conexao.php';

    if(isset($_GET['delete_id'])) {
        $id_delete = $_GET['delete_id'];

        $stmt = $connect->prepare("DELETE FROM clientes WHERE id = :id ");
        $stmt->bindValue(':id', $id_delete);

        if ($stmt->execute()) {
            header("Location: indexclie.php");
            exit();
        }
    }


    $query = $connect->prepare("SELECT * FROM clientes");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
   <a href="createclie.php"><button> Adicionar cliente </button></a>
    <h1>Clientes</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>bairro</th>
                <th>número</th>
                <th>botões</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['bairro']; ?></td>
                <td><?php echo $item['numero']; ?></td>
                <td>
                    <a href="updateclie.php?id=<?php echo $item['id']; ?>"><button>Editar</button></a>
                    <a href="indexclie.php?delete_id=<?php echo $item['id'];  ?> "onclick="return confirm('Deseja mesmo excluir')">
                    <button>Excluir</button></a>


                </td>
            
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../index.php"><button type="button">Voltar</button></a>
</body>
</html>
