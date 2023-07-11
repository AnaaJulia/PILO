<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main style="position:relative;">
        <a class="seta" href="index-inicial.php"><img width="28px" src="senta.png" alt=""></a>
        <section class="esquerda">
            
            <img src="docs/img/lado.png" alt="">

            <form action="cadatro" >
                <div class="texts">
                    <h1 class="log-text1 ">Olá novamente!</h1>
                    <h1 class="log-text2">Digite suas informações para acessar a <br>  sua conta<h1>
                </div>

                <div class="input-label">
                    <input type="email" id="email" autocomplete="off" class="inputuser" required /> 
                    <label class="labeluser" for="email">E-mail</label>
                </div>

                <div class="input-label">
                    <input type="text" id="cnpj" autocomplete="off" class="inputuser" required />
                    <label class="labeluser" for="cnpj">CNPJ</label>
                </div>

                <div class="input-label">
                    <input type="password" id="senha" autocomplete="off" class="inputuser" required />
                    <label class="labeluser" for="senha">Senha</label>
                </div>

                <button type="button" class="btn-login" type="submit"><a href="sidbar-adm/index.php"></a>Entrar</button>
            </form>
        </section>  

        <section class="direita">
            <img width="100%" src="docs/img/imgcad.png" alt="">
            <div>
                <h6 class="text-center">Não possui cadastro?</h6>
                <a href="cadastrar.php"><button class="text-center" id="nbut" type="submit">Cadastrar</button></a>
            </div>
        </section>
    </main>
</body>
</html>