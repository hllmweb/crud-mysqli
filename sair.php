<?php 
	session_start();
	
	if(isset($_SESSION["email"])):
		session_destroy();
	
		unset($_SESSION["email"]);

		header("Location: login.php");
	endif;
?>