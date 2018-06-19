<?php
	include "config.php";

	@$id_usuario = (int) $_GET["id"];

	$query_select = "SELECT * FROM usuarios WHERE id = {$id_usuario}";
	$result = $mysqli->query($query_select);
	$row = $result->fetch_array();
	
		$nome 		= $row["nome"];
		$email  	= $row["email"];
		$senha 		= $row["senha"];
		$telefone 	= $row["telefone"];
		$cpf 	  	= $row["cpf"];
		$endereco 	= $row["endereco"];

	if(@$_GET["acao"] == "editar"):
		$nome 		= utf8_decode($_POST["nome"]);
		$email 		= $_POST["email"];
		$senha 		= ($_POST["senha"] != $senha) ? md5($_POST["senha"]) : $_POST["senha"];
		$telefone 	= $_POST["telefone"];
		$cpf 		= $_POST["cpf"];
		$endereco   = utf8_decode($_POST["endereco"]);


		$query = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha' ,telefone='$telefone', cpf='$cpf', endereco='$endereco' WHERE id={$id_usuario}";
		$result = $mysqli->query($query);


		if($result === true):
			echo "<div class='msg-sucesso'>Usuário atualizado com sucesso! <a href='index.php' class='btn-back'>VOLTAR</a></div>";
		endif;
	endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CRUD - Adicionar</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
	<h1>CRUD - Editar</h1>
	<form action="editar.php?acao=editar&id=<?= $id_usuario; ?>" method="POST" id="formAdd">
		<label for="nome">
			<strong>Nome</strong>
			<input type="text" name="nome" value="<?= utf8_encode($nome); ?>" required>
		</label>
		<label for="email">
			<strong>E-Mail</strong>
			<input type="text" name="email" value="<?= $email; ?>" required>
		</label>
		<label for="senha">
			<strong>Senha</strong>
			<input type="password" name="senha" value="<?= $senha; ?>" required>
		</label>
		<label for="telefone">
			<strong>Telefone</strong>
			<input type="text" name="telefone" value="<?= $telefone; ?>" required>
		</label>
		<label for="cpf">
			<strong>CPF</strong>
			<input type="text" name="cpf" value="<?= $cpf; ?>" required>
		</label>
		<label for="endereco">
			<strong>Endereço</strong>
			<input type="text" name="endereco" value="<?= utf8_encode($endereco); ?>" required>
		</label>
		<div class="bloco-botao">
			<button type="submit" class="btn-add">Enviar</button>
		</div>
	</form>
	
</body>
</html>