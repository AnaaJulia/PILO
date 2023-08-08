<?php
    include "../config.php";
    
    session_start();
    $pdo = conectarBancoDados();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome_dentista"];
        $email = $_POST["email_dentista"];
        $cpf = $_POST["cpf_dentista"];
        $cro = $_POST["cro_dentista"];
        $tell = $_POST["tell_dentista"];

        $clinica_id = $_SESSION['clinica_id'];

        try {
            $query = "insert into dentista (nome_dentista, tell_dentista, cpf_dentista, email_dentista, cro_dentista, id_cli) values (:nome, :cpf, :email, :password, :nivel, :id_lab)";
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