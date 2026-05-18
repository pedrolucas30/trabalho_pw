<?php 
    include 'conexao.php';

    if(isset($_GET['delete_id'])) {
        $id_delete = $_GET['delete_id'];

        $stmt = $connect->prepare("DELETE FROM funcionários WHERE id = :id ");
        $stmt->bindValue(':id', $id_delete);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        }
    }


    $query = connect->prepare("SELECT * FROM funcionários");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
</head>
<body>
   <a href="create.php"><button> Adicionar categoria </button></a>
    <h1>Funcionários</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>data</th>
                <th>horas</th>
                <th>botões</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['data']; ?></td>
                <td><?php echo $item['horas']; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $item['id']; ?>"><button>Editar</button></a>
                    <a href="index.php?delete_id=<?php echo $item['id'];  ?> "onclick="return confirm('Deseja mesmo excluir')">
                    <button>Excluir</button></a>


                </td>
            
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
