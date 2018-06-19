<?php 
	include "config.php";

	session_start();

	if(!isset($_SESSION["email"]) && !isset($_SESSION["senha"])):
		session_destroy();

		unset($_SESSION["email"]);
		unset($_SESSION["senha"]);

		header("Location: login.php");
	endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
	<?= $_SESSION["email"]; ?>
	<a href="sair.php">Sair</a>
	
	<form action="busca.php" method="POST" id="formSearch">
		<input type="text" name="busca" placeholder="Pesquisar..."> 
		<button type="submit">Buscar</button>
	</form>
	
	<h1>CRUD</h1>
	<div class="bloco-botao">
		<a href="adicionar.php" class="btn-add">Adicionar</a>
	</div>
	<table id="tabela">
		<thead>
			<tr>
				<th><strong>ID</strong></th>
				<th><strong>NOME</strong></th>
				<th><strong>E-MAIL</strong></th>
				<th><strong>CPF</strong></th>
				<th><strong>AÇÃO</strong></th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$query = "SELECT * FROM usuarios";
				$result = $mysqli->query($query);
				#echo $result->num_rows;
				while($row = $result->fetch_array()):
			?>
			<tr>
				<td><?= $row["id"]; ?></td>
				<td><?= utf8_encode($row["nome"]); ?></td>
				<td><?= $row["email"]; ?></td>
				<td><?= $row["cpf"]; ?></td>
				<td>
					<a href="editar.php?id=<?= $row["id"]; ?>" class="btn-edit">Editar</a>
					<a href="deletar.php?id=<?= $row["id"]; ?>" class="btn-del">Deletar</a>
				</td>
			</tr>
			<?php 
				endwhile;
			?>
		</tbody>
	</table>
</body>
</html>
