<main class="cadastro">
    <img class="account-dec1" src="img/dec-sign1.png">
    <img class="account-dec2" src="img/dec-sign2.png">

    <section class="form-content">
        <div class="back-to-home">
            <a href="?"><img width="32px" src="img/arrow.png"></a>
        </div>
        
        <div class="col-md-12 form-title">
            <h4 class="col-md-6">Cadastro</h4>
            
        </div>

        <form class="sign-login" action="?page=insere" method="post">
            <div id="step-1" style="display:block;">
                <div class="row g-2">
                    <div class="col-md-6">
                        <label for="signNivel" class="form-label">Nível</label>
                        <select id="signNivel" name="signNivel" class="form-select">
                            <option selected value="1">Usuário</option>
                            <option value="2">Organizador</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="signCpf" class="form-label">CPF</label>
                        <input type="radio" id="signCpf" name="radioCpf-Cnpj" checked disabled>

                        <label for="signCnpj" class="form-label">CNPJ</label>
                        <input type="radio" id="signCnpj" name="radioCpf-Cnpj" disabled>

                        <input type="text" class="form-control" id="signCpf-Cnpj" name="signCpf-Cnpj" placeholder="___.___.___-__" disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="signName" class="form-label">Nome completo</label>
                        <input type="text" class="form-control" id="signName" name="signName" placeholder="Digite seu nome completo" required>
                    </div>
                </div>
            </div>

            <div id="step-2" style="display:none;">
                <div class="row g-2">
                    <div class="col-md-6">
                        <label for="signUser" class="form-label">Nome de Usuário</label>
                        <div class="input-group">
                            <span class="input-group-text addon-left" id="basic-addon1">@</span>
                            <input type="text" class="form-control input-group-input" id="signUser" name="signUser" placeholder="usuario" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="signDate" class="form-label">Data de nascimento</label>
                        <input type="date" class="form-control" id="signDate" name="signDate" placeholder="Confirme sua senha" required>
                    </div>
                
                    <div class="col-md-12">
                        <label for="signEmail" class="form-label">Endereço de email</label>
                        <input type="email" class="form-control" id="signEmail" name="signEmail" placeholder="Digite seu email" required>
                    </div>
                </div>
            </div>

            <div id="step-3" style="display:none;">
                <div class="row g-2">
                    <div class="col-md-6">
                        <label for="signPass" class="form-label">Senha</label>
                        <div class="pass-group"> 
                            <input type="password" class="form-control" id="signPass" name="signPass" placeholder="Insira sua senha" required>
                            <img src="img/showpass.png">
                        </div>
                        <span style="font-size:.8rem;text-decoration:none;color:#747272;">8-10 / Aa / 1 / @</span>
                    </div>

                    <div class="col-md-6">
                        <label for="signConfPass" class="form-label">Confirmar senha</label>
                        <input type="password" class="form-control" id="signConfPass" name="signConfPass" placeholder="Confirme sua senha" required>
                        <span style="font-size:.8rem;text-decoration:none;color:var(--bs-danger);">* As senhas não coincidem</span>
                    </div>

                    <div class="col-md-12">
                        <input class="form-check-input" type="checkbox" id="checkTerms" name="checkTerms" required>
                        <label class="form-check-label" for="checkTerms">Li e concordo com os <a href="">termos de uso</a></label>
                    </div>
                </div>
            </div>

            <div class="col-md-12 pagination">
                <span id="prog-1" class="prog active"></span>
                <span id="prog-2" class="prog"></span>
                <span id="prog-3" class="prog"></span>
            </div>
        
        
            <div class="row gx-2 form-btn">
                <div class="col-md-6">
                    <button style="display: none;" onclick="prev()" type="button" id="prev-btn" class="btn btn-outline-primary btn-full">Voltar</button>
                </div>
                
                <div id="div-next-btn" class="col-md-12">
                    <button style="display: none;" type="submit" id="send-btn" class="btn btn-primary btn-full">Enviar</button>

                    <button style="display: block;" onclick="next()" type="button" id="next-btn" class="btn btn-primary btn-full">Continuar</button>
                </div>
                
            </div>

            <div class="col-md-12 form-other">
                <span></span><p>ou</p><span></span>
            </div>

            <div class="col-md-12">
                <a href="" class="btn btn-google btn-full"><img width="20px" src="img/icon-google.png">Entrar com Google</a>
            </div>
        </form>

        <img height="100%" style="position:absolute;right:0;top:0;transform:translateX(50%);z-index:100;" src="img/transition.png">
    </section>

    <section class="welcome-content">
        <div class="logotipo">
            <a class="logo" href="?"><img width="48px" src="img/logo-icon.png"><img height="24px" src="img/logotipo.png"></a>
        </div> <!-- div-logotipo -->

        <div class="content">
            <h1>Seja Bem-Vindo!</h1>
            <p>Já possui cadastro?</p>
        </div>

        <a class="btn btn-secondary" href="?page=login">Logar</a>
    </section>
</main>
