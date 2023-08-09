<?php
    include "config.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['login']))
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>oi</p>
    <a href="cadcli.php" name="cad">cadastro</a>
        <br>
    <a href="loguser.php">Login</a>
</body>
</html>