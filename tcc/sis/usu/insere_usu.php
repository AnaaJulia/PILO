<?php
    $nivel = $_POST['signNivel'];
    $nome_completo = $_POST['signName'];
    $nome_usuario = $_POST['signUser'];
    $dt_nasc = $_POST['signDate'];
    $email = $_POST['signEmail'];
    $senha = $_POST['signPass'];

    $con = mysqli_connect("localhost", "root", "", "bd_aboa");
    $dt_nasc = implode("-", array_reverse(explode("/", $dt_nasc)));

    $sql = "INSERT INTO usuarios VALUES ";
    $sql .= "(0, '$nivel', '$nome_completo', '$nome_usuario', '$dt_nasc', '$email', '".sha1($senha)."', 1)";

    $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

    if($resultado) {
        header('Location: ?page=home');
        mysqli_close($con);
    } else {
        echo "Ocorreu um erro ao inserir o usuário.";
    }
?>
