<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Gerenciador Nosso Café</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-amber-50 min-h-screen flex flex-col items-center justify-center p-4 selection:bg-amber-200"> 
    
    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full text-center border border-amber-100 transition-all duration-300 hover:shadow-2xl">
        
        <h1 class="text-2xl font-bold text-amber-900 mb-2 flex items-center justify-center gap-2 tracking-wide">
            ☕ Nosso Café
        </h1>
        <p class="text-amber-700/60 font-medium mb-8 text-xs uppercase tracking-widest">Painel de Gerenciamento</p>
        
        <div class="flex flex-col gap-4">
            
            <a href="CRUDcard/indexcard.php" class="w-full bg-amber-700 hover:bg-amber-800 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-md block text-center transform hover:-translate-y-0.5 active:translate-y-0">
                Cardápio
            </a>
            
            <a href="CRUDclie/indexclie.php" class="w-full bg-amber-700 hover:bg-amber-800 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-md block text-center transform hover:-translate-y-0.5 active:translate-y-0">
                Clientes
            </a>
            
            <a href="CRUDpedi/indexpedi.php" class="w-full bg-amber-700 hover:bg-amber-800 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-md block text-center transform hover:-translate-y-0.5 active:translate-y-0">
                Pedidos
            </a>
            
            <hr class="my-2 border-amber-100">
            
            <a href="logout.php" class="w-full bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-3 px-4 rounded-xl transition duration-200 border border-red-100 block text-center">
                Sair do sistema
            </a>
            
        </div>
    </div>

</body>
</html>