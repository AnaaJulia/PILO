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
        $query = "UPDATE user_cli SET nome_usercli = :nome, email_usercli = :email, cpf_usercli = :cpf, pass_usercli = :senha, nivel_usercli = :nivel WHERE iduser_cli = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':senha', $senha);
        $stmt->bindValue(':nivel', $nivel);

        $stmt->execute();

        header("Location: lista_usercli.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao atualizar o usuário: " . $e->getMessage();
    }
}
?>



