<?php
	include "config.php";
	session_start();



	$busca = $_POST["busca"];

	$query = "SELECT * FROM usuarios WHERE nome LIKE '%$busca%'";
	$result = $mysqli->query($query);


	while($row = $result->fetch_array()):
		echo $row["nome"];
	endwhile;
?>