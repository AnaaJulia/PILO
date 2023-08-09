<main class="login">
    <img class="account-dec1" src="img/dec-login1.png">
    <img class="account-dec2" src="img/dec-login2.png">

    <section class="welcome-content">
        <div class="back-to-home">
            <a href="?"><img style="filter:invert(1)" width="32px" src="img/arrow.png"></a>
        </div>

        <div class="logotipo">
            <a class="logo" href="?"><img width="48px" src="img/logo-icon.png"><img height="24px" src="img/logotipo.png"></a>
        </div> <!-- div-logotipo -->

        <div class="content">
            <h1>Seja Bem-Vindo!</h1>
            <p>Ainda não possui cadastro?</p>
        </div>

        <a class="btn btn-secondary" href="?page=cadastro">Cadastrar</a>
    </section>

    <section class="form-content">
        <div class="col-md-12 form-title">
            <h4>Login</h4>
        </div>

        <form class="sign-login" action="?page=valida" method="post">
            <div class="row g-2">
                <div class="col-md-12">
                    <label for="loginEmail" class="form-label">Endereço de email</label>
                    <input type="email" class="form-control" id="loginEmail" name="signEmail" placeholder="Digite seu email" required>
                </div>

                <div class="col-md-12">
                    <label for="loginPass" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="loginPass" name="signPass" placeholder="Insira sua senha" required>
                    <span><a style="font-size: .85rem;" class="linkclick" href="">Esqueceu sua senha?</a></span>
                </div>
            </div>

            <div class="col-md-12 form-btn">
                <button type="submit" class="btn btn-primary btn-full">Entrar</button>
            </div>

            <div class="col-md-12 form-other"><span></span><p>ou</p><span></span></div>

            <div class="col-md-12">
                <a href="" class="btn btn-google btn-full"><img width="20px" src="img/icon-google.png"> Entrar com Google</a>
            </div>
        </form>

        <img height="100%" style="position:absolute;left:0;top:0;transform:translateX(-50%) rotate(180deg);z-index:100;" src="img/transition.png">
    </section>
</main>