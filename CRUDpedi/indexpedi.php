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
    <title>Gerenciar Pedidos - Nosso Café</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-amber-50 min-h-screen p-4 md:p-8 selection:bg-amber-200">

    <div class="max-w-5xl mx-auto">
        
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8 bg-white p-6 rounded-2xl shadow-md border border-amber-100">
            <div>
                <h1 class="text-3xl font-bold text-amber-900 flex items-center gap-2">
                    ☕ Pedidos Cadastrados
                </h1>
                <p class="text-amber-700/60 font-medium text-xs uppercase tracking-widest mt-1">Gerenciamento em tempo real</p>
            </div>
            
            <a href="createpedi.php" class="inline-flex items-center bg-amber-700 hover:bg-amber-800 text-white font-medium py-2.5 px-5 rounded-xl transition duration-200 shadow-md transform hover:-translate-y-0.5 active:translate-y-0 text-sm gap-2">
                ➕ Adicionar Pedido
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-amber-100 overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-amber-900 text-amber-50 uppercase text-xs tracking-wider font-semibold">
                            <th class="py-4 px-6 text-center w-16">ID</th>
                            <th class="py-4 px-6">Cliente / Nome</th>
                            <th class="py-4 px-6">Pedido</th>
                            <th class="py-4 px-6 w-32">Preço</th>
                            <th class="py-4 px-6 text-center w-48">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-amber-50 text-gray-700">
                        <?php if (empty($lista)): ?>
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-400 bg-amber-50/10 italic text-sm">
                                    Nenhum pedido registrado no momento.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($lista as $item): ?>
                            <tr class="hover:bg-amber-50/40 transition duration-150 odd:bg-white even:bg-amber-50/10">
                                <td class="py-4 px-6 text-center font-mono text-sm text-amber-800 font-bold">
                                    <?php echo $item['id']; ?>
                                </td class="py-4 px-6">
                                <td class="py-4 px-6 font-medium text-gray-900">
                                    <?php echo $item['nome']; ?>
                                </td>
                                <td class="py-4 px-6 text-sm">
                                    <span class="bg-amber-100/60 text-amber-900 px-2.5 py-1 rounded-lg font-medium">
                                        <?php echo $item['pedido']; ?>
                                    </span>
                                </td>
                                <td class="py-4 px-6 font-semibold text-amber-950 text-sm">
                                    R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="updatepedi.php?id=<?php echo $item['id']; ?>" 
                                           class="bg-amber-100 hover:bg-amber-200 text-amber-800 font-medium py-1.5 px-3 rounded-lg text-xs transition duration-150">
                                            Editar
                                        </a>
                                        <a href="indexpedi.php?delete_id=<?php echo $item['id']; ?>" 
                                           onclick="return confirm('Deseja mesmo excluir este pedido?')"
                                           class="bg-red-50 hover:bg-red-100 text-red-600 font-medium py-1.5 px-3 rounded-lg text-xs transition duration-150 border border-red-100">
                                            Excluir
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex justify-start">
            <a href="../index.php" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-5 rounded-xl transition duration-200 text-sm shadow-sm">
                ⬅ Voltar ao Início
            </a>
        </div>

    </div>

</body>
</html>