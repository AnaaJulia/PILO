<?php
    include "../config.php";
    
    session_start();
    $pdo = conectarBancoDados();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome_usercli"];
        $email = $_POST["email_usercli"];
        $cpf = $_POST["cpf_usercli"];
        $nivel = $_POST["nivel_usercli"];
        $pass = password_hash($_POST["pass_usercli"], PASSWORD_DEFAULT);

        $clinica_id = $_SESSION['clinica_id'];

        try {
            $query = "insert into user_cli (nome_usercli, cpf_usercli, email_usercli, pass_usercli, nivel_usercli, id_cli) values (:nome, :cpf, :email, :password, :nivel, :id_cli)";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':cpf', $cpf);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $pass);
            $stmt->bindValue(':nivel', $nivel);
            $stmt->bindValue(':id_cli', $clinica_id);
            $stmt->execute();

            header('Location: lista_usercli.php');

            exit();
        } catch (PDOException $e) {
            echo "Erro ao inserir usuário: " . $e->getMessage();
        }
    }
?>