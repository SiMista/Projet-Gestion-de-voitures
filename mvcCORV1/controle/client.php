<?php

function voituresDisponible(){
    require ("modele/clientBD.php") ;
    return $VoituresDispo = voituresDispo();
}

function accueil()
{
	$nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
	$pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
	$VoituresDispo = voituresDisponible();
	require("vue/client/accueilClient.html");
}

function mesVoitures(){
	require ("modele/clientBD.php") ;
	$Voitures = voitures();
	require ("vue/client/mesVehicules.html");
}

function louer(){
	$Voitures = isset($_POST['checkboxVoiture']) ? ($_POST['checkboxVoiture']) : '';;
	if(!empty($Voitures)) {
		require ("modele/clientBD.php") ;
		for($i=0; $i < count($Voitures); $i++) {
            creerFacture($Voitures[$i]);
			louerVoiture($Voitures[$i]);
		}
	}
	$nexturl = "index.php?controle=client&action=accueil";
	header("Location:" . $nexturl);
}

?>