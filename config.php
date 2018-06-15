<?php
	$mysqli = new mysqli("localhost","root","","crud_mysqli");
	if(!$mysqli):
		echo "Não foi possível se conectar ao host do banco de dados!".mysqli_connect_error();
		exit();
	endif;
?>