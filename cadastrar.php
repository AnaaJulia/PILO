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
    <main>
        <section class="esquerda">
            <img src="docs/img/aaaaaa.png" alt="">

            <form action="cadatro" >

                <div class="texts">
                    <h1 class="log-text1 ">Olá! <br> Vamos começar o cadastro. </h1>
                    <h1 class="log-text2">Preencha esses campos com as informações da sua empresa.<h1>
                </div>

                <input name="nome" autocomplete="off" required />
                <label for="text"><span id="nome">Nome </span></label> 

                <input name="number" autocomplete="off" required />
                <label for="number"><span id="cnpj">CNPJ</span></label>

                <input name="text" autocomplete="off" required />
                <label for="inputEmail4"><span id="email">Email</span></label>

                <input name="password" autocomplete="off" required />
                <label for="password"><span id="senha">Telefone</span></label>

                <input name="password" autocomplete="off" required />
                <label for="password"><span id="senha">Telefone</span></label>

                <input name="password" autocomplete="off" required />
                <label for="password"><span class="col-md-2" id="senha">N°</span></label>

                <button type="button" id="nlogin1" type="submit"> Cadastrar</button>
    

            </form>
        </section>  

        <section class="direita">
            <img width="100%" src="docs/img/imgcad.png" alt="">
            
            <button class="text-center" id="nbut" type="submit">Próximo <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 17 10">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg></button>

        </section>
    </main>
</body>
</html>