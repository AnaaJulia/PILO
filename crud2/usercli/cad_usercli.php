<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <form action="insere_usercli.php" method="post">
        NOME: <input type="text" name="nome_usercli" id=""> <br>
        EMAIL: <input type="email" name="email_usercli" id=""><br>
        CPF: <input type="text" name="cpf_usercli"  ><br>
        NIVEL: <select name="nivel_usercli" id="">
            <option selected>Escolha o nivel</option>
            <option value="1" disabled>Usuario administrador</option>
            <option value="2" >Usuario comum</option>
            <option value="3">Entregador</option>
        </select> <br>
        SENHA: <input type="password" name="pass_usercli"> <br>

        <input type="submit" value="Salvar">
    </form>

</body>

</html>