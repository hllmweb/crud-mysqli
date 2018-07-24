<?php
	include "config.php";

	if($_POST && $_GET["acao"] == "adicionar"):
		/*$nome 		= $_POST["nome"];
		$email 		= $_POST["email"];
		//inserir a validação do campo senha
		$telefone 	= $_POST["telefone"];
		$cpf 		= $_POST["cpf"];
		$endereco 	= $_POST["endereco"];
		
		$query 	= "INSERT INTO usuarios (nome, email, telefone, cpf, endereco) VALUES ('$nome','$email', '$telefone', '$cpf', '$endereco')";
		$result = $mysqli->query($query);

		if($result === true):
			echo "<div class='msg-sucesso'>Dados cadastrado com sucesso! <a href='index.php' class='btn-back'>VOLTAR</a></div>";
		endif;*/

		$imagem = $_FILES["anexo"];
		echo $imagem["tmp_name"]."<br>";
		echo $imagem["name"];
		move_uploaded_file($imagem["tmp_name"],"arquivos/".$imagem["name"]);

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
	<h1>CRUD - Adicionar</h1>
	<form action="adicionar.php?acao=adicionar" method="POST" id="formAdd" enctype="multipart/form-data">
		<label for="imagem">
			<strong>Imagem</strong>
			<input type="file" name="anexo">
		</label>
		<label for="nome">
			<strong>Nome</strong>
			<input type="text" name="nome" placeholder="Digite o Nome" required>
		</label>
		<label for="email">
			<strong>E-Mail</strong>
			<input type="email" name="email" placeholder="Digite o E-mail" required>
		</label>
		<label for="telefone">
			<strong>Telefone</strong>
			<input type="phone" name="telefone" placeholder="Digite o Telefone" required>
		</label>
		<label for="cpf">
			<strong>CPF</strong>
			<input type="text" name="cpf" placeholder="Digite o CPF" required>
		</label>
		<label for="endereco">
			<strong>Endereço</strong>
			<input type="text" name="endereco" placeholder="Digite o Endereço" required>
		</label>
		<div class="bloco-botao">
			<button type="submit" class="btn-add">Enviar</button>
		</div>
	</form>
	
</body>
</html>