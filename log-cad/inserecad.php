<?php
include "config.php";

session_start();
$pdo = conectarBancoDados();
// Função para verificar e obter os dados de um CEP através da API ViaCEP
function consultarCEP($cep) {
    $url = "https://viacep.com.br/ws/" . urlencode($cep) . "/json/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit_cli"])) {
        // Etapa 1: Receber os dados da clínica e armazená-los na sessão
        $_SESSION["nome"] = $_POST["nome"];
        $_SESSION["fantasia"] = $_POST["fantasia"];
        $_SESSION["cnpj"] = $_POST["cnpj"];
        $_SESSION["tell"] = $_POST["tell"];
        $_SESSION["tell2"] = $_POST["tell2"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["numero"] = $_POST["numero"];
        $_SESSION["complemento"] = $_POST["complemento"];
        $_SESSION["cep"] = $_POST["cep"];

        // Verificar se a clínica já existe no banco de dados com base no CNPJ, tell, tell2 e email
        $cnpj = $_SESSION["cnpj"];
        $tell = $_SESSION["tell"];
        $tell2 = $_SESSION["tell2"];
        $email = $_SESSION["email"];
        $queryVerificaClinica = "SELECT id_cli FROM clinica_odonto WHERE cnpj_cli = :cnpj OR tell_cli = :tell OR tell2_cli = :tell2 OR email_cli = :email";
        $stmtVerificaClinica = $pdo->prepare($queryVerificaClinica);
        $stmtVerificaClinica->bindValue(':cnpj', $cnpj);
        $stmtVerificaClinica->bindValue(':tell', $tell);
        $stmtVerificaClinica->bindValue(':tell2', $tell2);
        $stmtVerificaClinica->bindValue(':email', $email);
        $stmtVerificaClinica->execute();

        if ($stmtVerificaClinica->rowCount() === 0) {
            // Se a clínica não existe, verificar o CEP e cadastrá-lo automaticamente se necessário
            $cep = $_SESSION["cep"];

            // Verificar se o CEP já existe no banco de dados
            $queryVerificaCep = "SELECT cep FROM localidade WHERE cep = :cep";
            $stmtVerificaCep = $pdo->prepare($queryVerificaCep);
            $stmtVerificaCep->bindValue(':cep', $cep);
            $stmtVerificaCep->execute();

            if ($stmtVerificaCep->rowCount() === 0) {
                // CEP não existe no banco de dados, obter dados do CEP via API ViaCEP
                $endereco = consultarCEP($cep);

                if (isset($endereco["erro"])) {
                    // O CEP informado não é válido ou não foi encontrado
                    echo "O CEP informado é inválido ou não foi encontrado. Por favor, verifique o CEP digitado.";
                    exit();
                }

                // Cadastrar o CEP na tabela "localidade"
                $queryInsertCep = "INSERT INTO localidade (cep, logradouro, bairro, cidade, uf) VALUES (:cep, :rua, :bairro, :cidade, :uf)";
                $stmtInsertCep = $pdo->prepare($queryInsertCep);
                $stmtInsertCep->bindValue(':cep', $cep);
                $stmtInsertCep->bindValue(':rua', $endereco["logradouro"]);
                $stmtInsertCep->bindValue(':bairro', $endereco["bairro"]);
                $stmtInsertCep->bindValue(':cidade', $endereco["localidade"]);
                $stmtInsertCep->bindValue(':uf', $endereco["uf"]);
                $stmtInsertCep->execute();
            }

            // Redirecionar para o próximo formulário do usuário
            header("Location: caduser.php");
            exit();
        } else {
            // Se a clínica já existe, mostre um comentário informando ao usuário
            echo "A clínica com o CNPJ, Tell, Tell2 ou Email informado já está cadastrada. Por favor, verifique os dados informados.";
            exit();
        }
    } elseif (isset($_POST["submit_user"])) {
        // Verificar o email do usuário
        $email_user = $_POST["email_usercli"];
        $queryVerificaEmail = "SELECT iduser_cli FROM user_cli WHERE email_usercli = :email_usercli";
        $stmtVerificaEmail = $pdo->prepare($queryVerificaEmail);
        $stmtVerificaEmail->bindValue(':email_usercli', $email_user);
        $stmtVerificaEmail->execute();

        if ($stmtVerificaEmail->rowCount() > 0) {
            // O email já está cadastrado, exiba uma mensagem de erro ou redirecione para a página apropriada
            echo "O email informado já está cadastrado. Por favor, insira um email diferente.";
            exit();
        }

        // Verificar o CPF do usuário
        $cpf_user = $_POST["cpf_usercli"];
        $queryVerificaCPF = "SELECT iduser_cli FROM user_cli WHERE cpf_usercli = :cpf_usercli";
        $stmtVerificaCPF = $pdo->prepare($queryVerificaCPF);
        $stmtVerificaCPF->bindValue(':cpf_usercli', $cpf_user);
        $stmtVerificaCPF->execute();

        if ($stmtVerificaCPF->rowCount() > 0) {
            // O CPF já está cadastrado, exiba uma mensagem de erro ou redirecione para a página apropriada
            echo "O CPF informado já está cadastrado. Por favor, insira um CPF diferente.";
            exit();
        }

        // Restaurar a sessão devido ao redirecionamento para o arquivo de formulário anterior
        // session_start();

        // Inicie a transação
        // $pdo = conectarBancoDados(); 
        $pdo->beginTransaction();

        try {
            // Cadastrar a clínica
            $queryInsertClinica = "INSERT INTO clinica_odonto (cnpj_cli, nome_cli, fantasia_cli, tell_cli, tell2_cli, email_cli, numero_cli, complemento_cli, cep) VALUES (:cnpj, :nome, :fantasia, :tell, :tell2, :email, :numero, :complemento, :cep)";
            $stmtInsertClinica = $pdo->prepare($queryInsertClinica);
            $stmtInsertClinica->bindValue(':cnpj', $_SESSION["cnpj"]);
            $stmtInsertClinica->bindValue(':nome', $_SESSION["nome"]);
            $stmtInsertClinica->bindValue(':fantasia', $_SESSION["fantasia"]);
            $stmtInsertClinica->bindValue(':tell', $_SESSION["tell"]);
            $stmtInsertClinica->bindValue(':tell2', $_SESSION["tell2"]);
            $stmtInsertClinica->bindValue(':email', $_SESSION["email"]);
            $stmtInsertClinica->bindValue(':numero', $_SESSION["numero"]);
            $stmtInsertClinica->bindValue(':complemento', $_SESSION["complemento"]);
            $stmtInsertClinica->bindValue(':cep', $_SESSION["cep"]);
            $stmtInsertClinica->execute();

            // Obter o ID da clínica com base no CNPJ
            $queryGetClinicaId = "SELECT id_cli FROM clinica_odonto WHERE cnpj_cli = :cnpj";
            $stmtGetClinicaId = $pdo->prepare($queryGetClinicaId);
            $stmtGetClinicaId->bindValue(':cnpj', $_SESSION["cnpj"]);
            $stmtGetClinicaId->execute();
            $id_cli = $stmtGetClinicaId->fetchColumn();

            // Inserir os dados do usuário na tabela "usuarios", relacionando-o com a clínica
            $queryUsuario = "INSERT INTO user_cli (nome_usercli, email_usercli, cpf_usercli, nivel_usercli, pass_usercli, id_cli) VALUES (:nome_usercli, :email_usercli, :cpf_usercli, 1, :pass_usercli, :id_cli)";
            $stmtUsuario = $pdo->prepare($queryUsuario);
            $stmtUsuario->bindValue(':nome_usercli', $_POST["nome_usercli"]);
            $stmtUsuario->bindValue(':email_usercli', $_POST["email_usercli"]);
            $stmtUsuario->bindValue(':cpf_usercli', $_POST["cpf_usercli"]);
            $stmtUsuario->bindValue(':pass_usercli', password_hash($_POST["pass_usercli"], PASSWORD_DEFAULT)); // Criptografa a senha
            $stmtUsuario->bindValue(':id_cli', $id_cli);
            $stmtUsuario->execute();

            // Finalizar a transação
            $pdo->commit();

            // Limpar a sessão após o cadastro
            session_unset();
            session_destroy();

            // Redirecionar para uma página de sucesso ou faça outras ações após o cadastro
            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            // Em caso de erro, desfazer a transação (rollback) para evitar inconsistências no banco de dados
            $pdo->rollBack();
            echo "Erro ao cadastrar a clínica e o usuário: " . $e->getMessage();
        }
    }
}
?>

