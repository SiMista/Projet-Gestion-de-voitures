<?php

function voituresDisponible(){
    require ("modele/voitureBD.php") ;
    return $VoituresDispo = voituresDispo();
}

function accueil()
{
	$nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
	$pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
	$VoituresDispo = voituresDisponible();
	require("vue/utilisateur/accueil.html");
}

function mesVoitures(){
	require ("modele/voitureBD.php") ;
	$Voitures = voitures();
	require ("vue/utilisateur/mesVehicules.html");
}

function louer(){
	$Voitures = isset($_POST['checkboxVoiture']) ? ($_POST['checkboxVoiture']) : '';;
	if(empty($Voitures)) {
		echo("Vous n'avez pris aucune voiture ! C'est bien dommage...");
	} 
	else {
		require ("modele/voitureBD.php") ;
		for($i=0; $i < count($Voitures); $i++) {
			louerVoiture($Voitures[$i]);
		}
		$nexturl = "index.php?controle=client&action=accueil";
		header("Location:" . $nexturl);
	}
}

?>