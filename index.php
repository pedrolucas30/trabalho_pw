
<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Sistema Gerenciador LN</title>
</head>
<body>     
    <a href="CRUDFunc/indexfunc.php"></a>
    <a href="CRUDclie/indexclie.php"></a>
    <a href="CRUDvend/indexvend.php"></a>
    <a href="logout.php">Sair do Sistema</a>
</body>
</html>