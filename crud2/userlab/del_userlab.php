<?php
session_start();
include "../config.php";

$id = $_GET["id"]; // ID do usuário a ser excluído

try {
    $pdo = conectarBancoDados();

    $query = "DELETE FROM user_lab WHERE iduser_lab = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header('Location: lista_userlab.php'); // Redireciona após a exclusão
    exit();
} catch (PDOException $e) {
    echo "Erro ao excluir usuário: " . $e->getMessage();
}
?>
