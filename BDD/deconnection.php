<?php
	session_start();

	session_unset($_SESSION);
	unset($_GLOBAL);
	session_destroy();
	header('Location: ../Accueil.php');
	exit();
	
?>