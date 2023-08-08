<?php
    // Arquivo: meu_perfil.php
   
    // Verificar se o usuário está logado
    // if (!isset($_SESSION['usuario'])) {
    //     // Redirecionar para a página de login ou realizar alguma outra ação
    //     header('Location: ?page=login');
    //     exit();
    // }

    // Conexão com o banco de dados
    $mysqli = new mysqli('localhost', 'root', '', 'bd_aboa');

    // Verificar se ocorreu algum erro na conexão
    if ($mysqli->connect_errno) {
        // Tratar o erro de conexão, exibir uma mensagem adequada ou realizar alguma outra ação
        die('Erro na conexão com o banco de dados: ' . $mysqli->connect_error);
    }

    // Consulta SQL
    $id = $_GET['id'];
    $query = "SELECT * FROM usuarios WHERE id_usu = '$id'";
    $result = $mysqli->query($query);

    // Verificar se a consulta foi executada com sucesso
    if (!$result) {
        // Tratar o erro na consulta, exibir uma mensagem adequada ou realizar alguma outra ação
        die('Erro na consulta: ' . $mysqli->error);
    }

    // Exemplo de uso dos resultados da consulta
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Informações encontradas, exiba-as nos campos
        ?>

        <main class="meu-perfil">
            <section class="main-perfil">
                <h1>Meu <span>perfil</span></h1>
                <div class="head-perfil">
                    <div class="top-perfil">
                        <img src="img/user-icon.png">
                        <div class="nome-perfil">
                            <h2><?php echo $row['nome_usuario_usu'];?></h2>
                            <span>Usuário</span>
                        </div>
                    </div>
                    <div>
                        <button onclick="editarperfil()" class="btn btn-outline-primary thisbtn">Editar perfil</button>
                    </div>
                </div>

                <div class="content-perfil">
                    <form class="" action="?page=atualiza" method="post">
                        <div class="row g-2">
                            <div class="col-md-8">
                                <label for="signName" class="form-label">Nome completo</label>
                                <input type="text" class="form-control aaa" id="signName" name="signName" value="<?php echo $row['nome_completo_usu'];?>" required disabled>
                            </div>

                            <div class="col-md-4">
                                <label for="signUser" class="form-label">Nome de Usuário</label>
                                <div class="input-group">
                                    <span class="input-group-text addon-left disabled" id="basic-addon1">@</span>
                                    <input type="text" class="form-control input-group-input" id="signUser" name="signUser" value="<?php echo $row['nome_usuario_usu'];?>" required disabled>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row g-2">
                            <div class="col-md-4">
                                <label for="signDate" class="form-label">Data de nascimento</label>
                                <input type="date" class="form-control aaa" id="signDate" name="signDate" value="<?php echo $row['data_nascimento_usu'];?>" required disabled>
                            </div>
                        
                            <div class="col-md-8">
                                <label for="signEmail" class="form-label">Endereço de email</label>
                                <input type="email" class="form-control aaa" id="signEmail" name="signEmail" value="<?php echo $row['email_usu'];?>" required disabled>
                            </div>
                        </div>

                        <div class="btn-area">
                            <button type="button" href="?page=excluir" class="btn btn-outline-danger"> Excluir conta</button>

                            <button type="submit" class="btn btn-outline-primary">Salvar</button>
                        </div>
                    </form>

                    <aside>
                        rodrigo chupa bolas
                    </aside>
                </div>
            </section>
        </main>

        <?php
    } else {
        // Caso não haja resultados, exiba uma mensagem ou tome alguma outra ação
        echo "Nenhum resultado encontrado.";
    }

    // Fechar a conexão com o banco de dados
    $mysqli->close();
?>
