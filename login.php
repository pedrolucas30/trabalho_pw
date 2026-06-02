<?php
session_start(); 

if (isset($_SESSION['erro_login'])) {
    echo  $_SESSION['erro_login'] ;
    unset($_SESSION['erro_login']);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta name="viewport" >
    <title>Login-Nosso Café</title>
    
</head>
<body >
        
    <h2>Área de Login</h2>
        

    <form action="validarlogin.php" method="POST">
        <label for="usuario"> Usuário/E-mail </label>
        <input type="email" name="usuario" id="usuario" required placeholder="seu@email.com">
                
        <label for="senha" > Senha </label>
        <input    id="senha" type="password"  name="senha"  required >
        
        <button type="submit" > Entrar </button>
        
    </form> 
</body>
</html>


