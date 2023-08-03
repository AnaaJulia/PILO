<?php
	$usu = $_GET['id_usu'];
	$sql = mysqli_query($con, "select * from usuario where id_usu = '".$usu."';");
	$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<!-- <h3 class="page-header">Visualizar registro do Aluno - <echo $matricula; > </h3> -->
	<div class="row">
		<div class="col-md-5">
			<p><strong>Nome Completo</strong></p>
			<p><?php echo $row['nome_completo_usu'];?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Nome de Usuário</strong></p>
			<p><?php echo $row['nome_usuario_usu'];?></p>
		</div>
		<div class="col-md-4">
			<p><strong>Data Nascimento</strong></p>
			<p><?php echo date('d/m/Y',strtotime($row['data_nascimento_usu'])); ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<p><strong>Email</strong></p>
			<p><?php echo $row['email_usu'];?></p>
		</div>
	</div>
	<hr/>
	<div id="actions" class="row">
		<div class="col-md-12">
			<a href="?page=lista_alu" class="btn btn-default">Voltar</a>
				<?php echo "<a href=?page=fedita_alu&matricula=".$row['mat_alu']." class='btn btn-primary'>Editar</a>";?>
				<?php echo "<a href=?page=excluir_alu&matricula=".$row['mat_alu']." class='btn btn-danger'>Excluir</a>";?>
		</div>
	</div>
</div>
