<?php
	session_start();

  	// Verifica se o formulário foi enviado
  	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// Obtém os valores do formulário
		$email = $_POST['signEmail'];
		$senha = sha1($_POST['signPass']);

		// Realiza a conexão com o banco de dados
		include "base/conexao.php";

		// Verifica se a conexão foi estabelecida com sucesso
		if (!$con) {
			echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
			exit;
    	}

		// Escapa os valores para prevenir SQL injection
		$email = mysqli_real_escape_string($con, $email);

		// Monta a consulta SQL
		$sql = "SELECT id_usu, email_usu, senha_usu FROM usuarios WHERE email_usu = '$email'";

		// Executa a consulta
		$query = mysqli_query($con, $sql);

		$row = mysqli_fetch_assoc($query);
		$senha_armazenada = $row['senha_usu'];

		$id = $row['id_usu'];

		// Verifica se a consulta foi executada com sucesso
		if (!$query) {
			echo "Erro na consulta: " . mysqli_error($con);
			exit;	
		}

		// Verifica se a consulta retornou algum resultado
		if (mysqli_num_rows($query) > 0) {
			// Verifica se a senha fornecida coincide com a senha armazenada
			if ($senha !== $senha_armazenada) {
				echo "Senha incorreta!";
							
			} else {
				// Redirecione para a página do perfil
				header("Location: ?page=perfil&id=$id");
				exit;
			}

		} else {
			echo "Nenhum usuário encontrado com o ID especificado.";
		}

		// Fecha a conexão com o banco de dados
		mysqli_close($con);
  	}
?>
