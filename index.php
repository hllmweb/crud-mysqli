<?php 
	include "config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
	<h1>CRUD</h1>
	<div class="bloco-botao">
		<a href="adicionar.php" class="btn-add">Adicionar</a>
	</div>
	<table id="tabela">
		<thead>
			<tr>
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
