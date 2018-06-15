<?php 
	include "config.php";

	if($_POST && $_GET["acao"] == "acessar"):
		$email 	= $_POST["email"];

		$query  = "SELECT * FROM usuarios WHERE email = '$email'";
		$result = $mysqli->query($query);

		
		if($result->num_rows == 1):
			session_start();

			$_SESSION["email"] = $email;
			header("Location: index.php");
		else:
			session_destroy();

			unset($_SESSION["email"]);
			header("Location: login.php?acao=error");
		endif;
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
	<form action="login.php?acao=acessar" method="POST" id="formLogin">
		<label for="email">
			<strong>E-Mail</strong>
			<input type="text" name="email" placeholder="E-Mail" required>
		</label>
		<label for="senha">
			<strong>Senha</strong>
			<input type="password" name="senha" placeholder="Senha" required>
		</label>	
		<button type="submit" class="btn-go">Entrar</button>
	</form>
</body>
</html>