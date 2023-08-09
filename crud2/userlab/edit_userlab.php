<?php
session_start();
include "../config.php";
$pdo = conectarBancoDados();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... (mesmo código de atualização que você já tem)
} elseif (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "SELECT * FROM user_lab WHERE iduser_lab = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <!-- Formulário de edição -->
    <form action="att_userlab.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['iduser_lab']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $user['nome_userlab']; ?>"><br>
        E-mail: <input type="email" name="email" value="<?php echo $user['email_userlab']; ?>"><br>
        CPF: <input type="text" name="cpf" value="<?php echo $user['cpf_userlab']; ?>"><br>
        Senha: <input type="password" name="senha"><br>
        Nível:
        <select name="nivel">
            <option value="1" <?php if ($user['nivel_userlab'] == 1) echo "selected"; ?> disabled >Administrador</option>
            <option value="2" <?php if ($user['nivel_userlab'] == 2) echo "selected"; ?>>Comum</option>
            <option value="3" <?php if ($user['nivel_userlab'] == 3) echo "selected"; ?>>Entregador</option>
        </select><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>

