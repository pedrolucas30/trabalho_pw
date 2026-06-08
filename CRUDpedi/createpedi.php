<?php 
include '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comida = $_POST['nome'];
    $pedido = $_POST['pedido'];
    $preco = $_POST['preco'];

    $stmt = $connect->prepare("INSERT INTO pedidos (nome, pedido, preco) VALUES (:nome, :pedido, :preco)");
    $stmt->bindValue(":nome", $comida);
    $stmt->bindValue(":pedido", $pedido);
    $stmt->bindValue(":preco", $preco);

    if ($stmt->execute()) {
        header("Location: indexpedi.php");
        exit();
    }  else {
        $erro = $stmt->errorInfo();
        echo "Erro ao salvar: " . $erro[2];
    }  
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Pedido - Nosso Café</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-amber-50 min-h-screen flex flex-col items-center justify-center p-4 selection:bg-amber-200">

    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full border border-amber-100 transition-all duration-300 hover:shadow-2xl">
        
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-amber-900 flex items-center justify-center gap-2 tracking-wide">
                ☕ Novo Pedido
            </h1>
            <p class="text-amber-700/60 font-medium text-xs uppercase tracking-widest mt-1">Insira os dados para registrar</p>
        </div>

        <form action="createpedi.php" method="post" class="space-y-5">
            
            <div>
                <label for="nome" class="block text-sm font-semibold text-amber-950 mb-1">Nome do Cliente:</label>
                <input type="text" name="nome" id="nome" placeholder="Ex: Maria Silva" required
                       class="w-full px-4 py-2.5 rounded-xl border border-amber-200 bg-amber-50/30 text-amber-900 placeholder-amber-700/30 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent transition duration-200">
            </div>

            <div>
                <label for="pedido" class="block text-sm font-semibold text-amber-950 mb-1">Pedido:</label>
                <input type="text" name="pedido" id="pedido" placeholder="Ex: Cappuccino + Croissant" required
                       class="w-full px-4 py-2.5 rounded-xl border border-amber-200 bg-amber-50/30 text-amber-900 placeholder-amber-700/30 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent transition duration-200">
            </div>

            <div>
                <label for="preco" class="block text-sm font-semibold text-amber-950 mb-1">Preço (R$):</label>
                <input type="number" step="0.01" name="preco" id="preco" placeholder="0,00" required
                       class="w-full px-4 py-2.5 rounded-xl border border-amber-200 bg-amber-50/30 text-amber-900 placeholder-amber-700/30 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent transition duration-200">
            </div>

            <hr class="my-2 border-amber-100">

            <div class="flex flex-col gap-3 pt-2">
                <button type="submit" 
                        class="w-full bg-amber-700 hover:bg-amber-800 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-md transform hover:-translate-y-0.5 active:translate-y-0 text-center">
                    Confirmar Pedido
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