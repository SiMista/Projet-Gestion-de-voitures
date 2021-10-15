<?php
	$pdo = null;
	$hostname = "localhost";
	$bdd = "econtact";
	$username = "root";
	$password = "root";

	try
	{
		$pdo = new PDO("mysql:host=$hostname;dbname=$bdd", $username, $password);   
		$pdo->query("SET NAMES 'utf8';");
	} catch( PDOException $e ) {
		echo "Erreur SQL :", $e->getMessage();
	}
?>