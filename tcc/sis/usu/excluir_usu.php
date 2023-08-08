<?php
    $id = (int) @$_GET['id_usu'];
    
    $sql = "delete from usuarios where id_usu = '$id';"; 

    include "base/conexao.php";

    $resultado = mysqli_query($con, $sql)or die(mysqli_error());

    if ($resultado) {
        header('Location: ?page=home');
        echo "<script>
                alert('Usuário excluído com sucesso')
            </script>";   
        mysqli_close($con);
    }else{
        header('Location: ?page=logar');
        mysqli_close($con);
    }
?>