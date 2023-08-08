<?php
function conectarBancoDados(){
    $host = "localhost";
    $db = "p.i.l.o";
    $usuario = "root";
    $senha = "";
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $usuario, $senha);
        // Configuração adicional para lançar exceções em caso de erros no PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        exit();
    }
}
?>