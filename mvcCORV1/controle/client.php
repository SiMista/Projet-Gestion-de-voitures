<?php

function accueil()
{
	$nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
	$pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
	$VoituresDispo = voituresDisponible();
	require("vue/client/accueilClient.tpl");
}

function voituresDisponible(){
    require ("modele/clientBD.php") ;
    return $VoituresDispo = voituresDispo();
}

function mesVoitures(){
	require ("modele/clientBD.php") ;
	$Voitures = voitures();
	require ("vue/client/mesVoitures.tpl");
}

function louer(){
	$Voitures = isset($_POST['checkboxVoiture']) ? ($_POST['checkboxVoiture']) : '';
	$dateF = isset($_POST['dateF']) ? ($_POST['dateF']) : '';
	if(!empty($Voitures)) {
		require ("modele/clientBD.php") ;
		for($i=0; $i < count($Voitures); $i++) {
			creerFacture($Voitures[$i], $dateF[$i]);
			louerVoiture($Voitures[$i]);           
		}
	}
	$nexturl = "index.php?controle=client&action=accueil";
	header("Location:" . $nexturl);
}
function Clients(){
	require ("modele/clientBD.php") ;
	$user = mesClients();
	return $user;
}
?>