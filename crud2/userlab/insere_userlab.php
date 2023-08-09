<?php
    include "../config.php";
    
    session_start();
    $pdo = conectarBancoDados();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome_userlab"];
        $email = $_POST["email_userlab"];
        $cpf = $_POST["cpf_userlab"];
        $nivel = $_POST["nivel_userlab"];
        $pass = password_hash($_POST["pass_userlab"], PASSWORD_DEFAULT);

        $lab_id = $_SESSION['lab_id'];

        try {
            $query = "insert into user_lab (nome_userlab, cpf_userlab, email_userlab, pass_userlab, nivel_userlab, id_lab) values (:nome, :cpf, :email, :password, :nivel, :id_lab)";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':cpf', $cpf);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $pass);
            $stmt->bindValue(':nivel', $nivel);
            $stmt->bindValue(':id_lab', $labnica_id);
            $stmt->execute();

            header('Location: lista_userlab.php');

            exit();
        } catch (PDOException $e) {
            echo "Erro ao inserir usuário: " . $e->getMessage();
        }
    }
?>