<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar cardapio</title>
</head>
<body>
    <form action="updatecard.php" method="post">
        <input type="hidden" name="id" value="<?php echo $card->id; ?>">
    </form>
    
</body>
</html>
<?php 

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $atualizar = $_POST['atualizar'];


}


?>