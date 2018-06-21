<?php 
	include "config.php";

	if($_POST && $_GET["acao"] == "acessar"):
		$email 	= $_POST["email"];

		$query  = "SELECT * FROM usuarios WHERE email = '$email'";
		$result = $mysqli->query($query);
		$row = $result->fetch_array();
		
		if($result->num_rows == 1):
			
			$email_cliente = $row["email"];
			$senha = $row["senha"];
			//com base nessas informações, posso criar uma outra página onde o usuário dono do email em questão irá poder modificar a senha
			$email = mail($email_cliente, "Dados de acesso", "Senha: {$senha}");
			if($email):
				echo "<div class='msg-sucesso'>E-Mail Enviado com Sucesso!</div>";
			
			endif;
			#header("Location: index.php");
		else:

			header("Location: esqueceu-senha.php?acao=error");
		endif;
	endif;

	if(@$_GET["acao"] == "error"):
		echo "<div class='msg-error'>Dados incorreto!</div>";
	endif;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Acesso ao CRUD - Login</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
	<form action="esqueceu-senha.php?acao=acessar" method="POST" id="formLogin">
		<label for="email">
			<strong>E-Mail</strong>
			<input type="text" name="email" placeholder="E-Mail" required>
		</label>
		<button type="submit" class="btn-go">Entrar</button>
	</form>
	<div class="bloco-botao">
		<a href="javascript.void(0)" onclick="window.history.back();">Voltar</a>
	</div>
</body>
</html>