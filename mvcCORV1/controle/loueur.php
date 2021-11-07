<?php

function accueil()
{
	$nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
	$pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
	$locationsEnCours = locationsEnCours();
	require("vue/loueur/accueilLoueur.html");
}

function locationsEnCours(){
	require ("modele/loueurBD.php") ;
	return $locations = locations();
}

function monStock(){
	require ("modele/loueurBD.php") ;
	$stock = stock();
	require ("vue/loueur/monStock.html");
}

?>