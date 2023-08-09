<?php
session_start();
include "../config.php";

try {
    $pdo = conectarBancoDados();

    $query = "SELECT * FROM user_cli";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar usuários: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h2>Lista de Usuários</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Nível</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario['iduser_cli']; ?></td>
            <td><?php echo $usuario['nome_usercli']; ?></td>
            <td><?php echo $usuario['cpf_usercli']; ?></td>
            <td><?php echo $usuario['email_usercli']; ?></td>
            <td><?php echo $usuario['nivel_usercli']; ?></td>
            <td>
                <a href="edit_usercli.php?id=<?php echo $usuario['iduser_cli']; ?>">Editar</a>
                <a href="del_usercli.php?id=<?php echo $usuario['iduser_cli']; ?>" onclick="return confirm('Deseja realmente excluir o usuário?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="cad_usercli.php">Inserir Novo Usuário</a>
</body>
</html>
