<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Clínica</title>
    <script src="script.js"></script>
</head>
<body>
    <form action="inserecad.php" method="post">
        NOME: <input type="text" name="nome" id="" maxlength="100"> <br>
        FANTASIA: <input type="text" name="fantasia" id="" maxlength="100"><br>
        CNPJ:<input type="text" name="cnpj" id="cnpj" maxlength="18" oninput="this.value = formatarCNPJ(this.value)"><br>
        TELL: <input type="tel" name="tell" id="tell" maxlength="14" oninput="this.value = formatarTelefone(this.value)"><br>
        TELL2: <input type="tel" name="tell2" id="tell2" maxlength="14" oninput="this.value = formatarTelefone(this.value)"><br>
        EMAIL: <input type="email" name="email" id="" maxlength="100"><br>
        NUMERO: <input type="number" name="numero" id="" maxlength="10"><br>
        COMPLEMENTO: <input type="text" name="complemento" id="" maxlength="100"><br>
        CEP:<input name="cep" type="text" id="cep" value="" size="10" maxlength="9" oninput="this.value = formatarCEP(this.value)"/><br/>

        <input type="submit" name="submit_cli" value="Salvar">
    </form>
</body>
</html>

