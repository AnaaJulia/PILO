<?php
session_start();
include "../config.php";
$pdo = conectarBancoDados();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Hash da nova senha
    $nivel = $_POST["nivel"];

    try {
        $query = "UPDATE user_lab SET nome_userlab = :nome, email_userlab = :email, cpf_userlab = :cpf, pass_userlab = :senha, nivel_userlab = :nivel WHERE iduser_lab = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':senha', $senha);
        $stmt->bindValue(':nivel', $nivel);

        $stmt->execute();

        header("Location: lista_userlab.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao atualizar o usuário: " . $e->getMessage();
    }
}
?>



