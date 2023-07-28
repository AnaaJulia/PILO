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

            <form action="cadatro" class="formu">
                <div class="texts">
                    <h1 class="log-text1 ">Ok!</h1>
                    <h1 class="log-text2">Vamos começar o seu cadastro.<h1> 
                    <h1 class="log-text2">Preencha esses campos com as informações da sua empresa<h1>
                </div>

                <div class="input-label">
                    <input type="text" id="nome" autocomplete="off" class="inputuser" required />
                    <label class="labeluser" for="senha">Nome</label>
                </div>

                <div class="input-label">
                    <input type="email" id="email" autocomplete="off" class="inputuser" required /> 
                    <label class="labeluser" for="email">E-mail</label>
                </div>
                
                <div class="input-label">
                    <input type="text" id="cnpj" autocomplete="off" class="inputuser inp-cnpj" maxlength="18" onkeypress="masc_cnpj(this)" onkeydown="return somente_numero1(evente)" required />
                    <label class="labeluser" for="cnpj">CNPJ</label>
                </div>

                <div class="input-label">
                    <input type="text" id="nome-fan" autocomplete="off" class="inputuser" required />
                    <label class="labeluser" for="senha">Nome Fantasia</label>
                </div>

                <div class="input-label">
                    <input type="text" id="tell" autocomplete="off" class="inputuser inp-tel" maxlength="14" class="form-control" id="telefone" onkeypress="mascara_telefone(this)" onkeydown=" return somente_numero(event)" required  />
                    <label class="labeluser" for="tel">Telefone</label>
                </div>

                <div class="localiza">
                    <div class="input-label">
                        <input type="text" id="cep" autocomplete="off" class="inputuser inp-cep " maxlength="9" onkeypress="masc_cep(this)" onkeydown="return somente_numero1(evente)" required />
                        <label class="labeluser" for="cnpj">CEP</label>

                        <input type="number" id="num-cep" autocomplete="off" class="inputuser inp-n " min="1" max="999999"required />
                        <label class="labeluser lab-num" for="cnpj">N°</label>
                    </div>

                </div>
           
        </section>  

        <section class="direita">
            <img width="100%" src="docs/img/imgcad.png" alt="">
            
            <a href="cadastrar.php"><button class="text-center" id="nbut" type="submit">Próximo <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 17 10">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg></button></a>
            

        </section>
    </main>

    <script src="js/javascript.js"></script>
</body>
</html>