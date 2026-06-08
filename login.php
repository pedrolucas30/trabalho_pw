<?php
session_start(); 

if (isset($_SESSION['erro_login'])) {
    $erro = $_SESSION['erro_login'];
    unset($_SESSION['erro_login']);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nosso Café</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-amber-50 min-h-screen flex flex-col items-center justify-center p-4 selection:bg-amber-200">

    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full border border-amber-100 transition-all duration-300 hover:shadow-2xl">
        
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-amber-900 flex items-center justify-center gap-2 tracking-wide">
                ☕ Nosso Café
            </h1>
            <p class="text-amber-700/60 font-medium text-xs uppercase tracking-widest mt-1">Área de Login</p>
        </div>

        <?php if (isset($erro)): ?>
            <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm font-medium flex items-center gap-2">
                ⚠️ <?php echo $erro; ?>
            </div>
        <?php endif; ?>

        <form action="validarlogin.php" method="POST" class="space-y-5">
            
            <div>
                <label for="usuario" class="block text-sm font-semibold text-amber-950 mb-1">Usuário / E-mail:</label>
                <input type="email" name="usuario" id="usuario" placeholder="seu@email.com" required
                       class="w-full px-4 py-2.5 rounded-xl border border-amber-200 bg-amber-50/30 text-amber-900 placeholder-amber-700/30 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent transition duration-200">
            </div>

            <div>
                <label for="senha" class="block text-sm font-semibold text-amber-950 mb-1">Senha:</label>
                <input type="password" name="senha" id="senha" placeholder="*****" required
                       class="w-full px-4 py-2.5 rounded-xl border border-amber-200 bg-amber-50/30 text-amber-900 placeholder-amber-700/30 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent transition duration-200">
            </div>

            <hr class="my-2 border-amber-100">

            <div class="pt-2">
                <button type="submit" 
                        class="w-full bg-amber-700 hover:bg-amber-800 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-md transform hover:-translate-y-0.5 active:translate-y-0 text-center">
                    Entrar
                </button>
            </div>
        </form>
    </div>

</body>
</html>