<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Gerenciador Nosso Café</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-amber-50 min-h-screen flex flex-col items-center justify-center p-4"> 
    
    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full text-center border border-amber-100">
        <h1 class="text-2xl font-bold text-amber-900 mb-6 flex items-center justify-center gap-2">
            ☕ Nosso Café
        </h1>
        <p class="text-gray-600 mb-8 text-sm">Painel de Gerenciamento</p>
        
        <div class="flex flex-col gap-4">
            <a href="CRUDcard/indexcard.php">
                <button type="submit" class="w-full bg-amber-700 hover:bg-amber-800 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-md">
                    Cardápio
                </button>
            </a>
            
            <a href="CRUDclie/indexclie.php">
                <button type="submit" class="w-full bg-amber-700 hover:bg-amber-800 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-md">
                    Clientes
                </button>
            </a>
            
            <a href="CRUDpedi/indexpedi.php">
                <button type="submit" class="w-full bg-amber-700 hover:bg-amber-800 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-md">
                    Pedidos
                </button>
            </a>
            
            <hr class="my-2 border-gray-200">
            
            <a href="logout.php">
                <button type="submit" class="w-full bg-red-50 hover:bg-red-100 text-red-600 font-medium py-3 px-4 rounded-xl transition duration-200 border border-red-200">
                    Sair do sistema
                </button>
            </a>
        </div>
    </div>

</body>
</html>