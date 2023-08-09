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
          <div class="texts">
                <h1 class="lab-cli ">Primeiro diga se você estará representando uma Clínica ou Laboratório</h1>
                <img class="lab-img" width="100%" src="docs/img/lab.png" alt="">
            </div>
            <div>
            
                <a href="cadastrar.php"><button class="text-center" id="btn-labcli" type="submit">Laboratório</button></a>
            </div>
        </section>
        

        <section class="direita">
            <img width="100%" src="docs/img/cli.png" alt="">
            
            <a href="cadastrar.php"><button class="text-center" id="nbut" type="submit">Clínica</button></a>

        </section>
    </main>

    <script src="js/javascript.js"></script>
</body>
</html>