<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Usuário</title>
    <script src="script.js"></script>
</head>
<body>
    <form action="inserecad.php" method="post">
        NOME: <input type="text" name="nome_usercli" id="" maxlength="100"> <br>
        EMAIL: <input type="email" name="email_usercli" id="" maxlength="100"><br>
        CPF: <input type="text" name="cpf_usercli" id="cpf" maxlength="14" oninput="this.value = formatarCPF(this.value)"><br>
        SENHA: <input type="password" name="pass_usercli" maxlength="255"> <br>
        <input type="submit" name="submit_user" value="Salvar">
    </form>
</body>
</html>
