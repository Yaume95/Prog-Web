<?php

	$user='root';
	$pw='';
	$bdd='projet_web';
	
	$dbh= new PDO('mysql:host=127.0.0.1;dbname=' . $bdd, $user, $pw);
?>