<?php
    require_once '../conexao.php';

    session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit();
}

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
            echo "Erro ao salvar: " . $erro[2];
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
    <title>Atualizar Pedidos - Nosso Café</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-amber-50 min-h-screen flex flex-col items-center justify-center p-4 selection:bg-amber-200">

    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full border border-amber-100 transition-all duration-300 hover:shadow-2xl">
        
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-amber-900 flex items-center justify-center gap-2 tracking-wide">
                📝 Editar Pedido
            </h1>
            <p class="text-amber-700/60 font-medium text-xs uppercase tracking-widest mt-1">Atualize as informações abaixo</p>
        </div>

        <form action="updatepedi.php" method="post" class="space-y-5">
            <input type="hidden" name="id" value="<?php echo $card->id; ?>">

            <div>
                <label for="nome" class="block text-sm font-semibold text-amber-950 mb-1">Comida / Cliente:</label>
                <input type="text" name="nome" id="nome" value="<?php echo $card->nome; ?>" 
                       class="w-full px-4 py-2.5 rounded-xl border border-amber-200 bg-amber-50/30 text-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent transition duration-200">
            </div>

            <div>
                <label for="pedidos" class="block text-sm font-semibold text-amber-950 mb-1">Pedido / Descrição:</label>
                <input type="text" name="pedidos" id="pedidos" value="<?php echo $card->pedido; ?>" 
                       class="w-full px-4 py-2.5 rounded-xl border border-amber-200 bg-amber-50/30 text-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent transition duration-200">
            </div>

            <div>
                <label for="preco" class="block text-sm font-semibold text-amber-950 mb-1">Preço (R$):</label>
                <input type="number" step="0.01" name="preco" id="preco" value="<?php echo $card->preco; ?>" 
                       class="w-full px-4 py-2.5 rounded-xl border border-amber-200 bg-amber-50/30 text-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent transition duration-200">
            </div>

            <hr class="my-2 border-amber-100">

            <div class="flex flex-col gap-3 pt-2">
                <button type="submit" 
                        class="w-full bg-amber-700 hover:bg-amber-800 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-md transform hover:-translate-y-0.5 active:translate-y-0 text-center">
                    Salvar Alterações
                </button>
                
                <a href="indexpedi.php" 
                   class="w-full bg-gray-50 hover:bg-gray-100 text-gray-600 font-medium py-3 px-4 rounded-xl transition duration-200 border border-gray-200 block text-center">
                    Cancelar
                </a>
            </div>
        </form>
    </div>

</body>
</html>