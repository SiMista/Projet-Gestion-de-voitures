<?php

function accueil()
{
	$nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
	$pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
	$locationsEnCours = locationsEnCours();
	require("vue/loueur/accueilLoueur.html");
}

function locationsEnCours()
{
	require("modele/loueurBD.php");
	return $locations = locations();
}

function monStock()
{
	require("modele/loueurBD.php");
	$stock = stock();
	require("vue/loueur/monStock.html");
}

function gererStock()
{
	require("modele/loueurBD.php");
	if (isset($_POST['btnAjouter'])) {
		$idV = $_POST['btnAjouter'];
		ajouter($idV);
	} else {
		$idV = $_POST['btnRetirer'];
		retirer($idV);
	}
	$nexturl = "index.php?controle=loueur&action=monStock";
	header("Location:" . $nexturl);
}

function nouvelleVoiture()
{
	$typeV = isset($_POST['typeV']) ? trim($_POST['typeV']) : '';
	$prix = isset($_POST['prix']) ? trim($_POST['prix']) : '';
	$nb = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
	$categorie = isset($_POST['categorie']) ? trim($_POST['categorie']) : '';
	$moteur = isset($_POST['moteur']) ? trim($_POST['moteur']) : '';
	$vitesse = isset($_POST['vitesse']) ? trim($_POST['vitesse']) : '';
	$nbPlaces = isset($_POST['nbPlaces']) ? trim($_POST['nbPlaces']) : '';
	$photo = isset($_POST['photo']) ? trim($_POST['photo']) : '';
	
	require("modele/loueurBD.php");
	if (count($_POST) === 0) require("vue/loueur/nouvelleVoitureStock.html");
	else {
		if (!verif_voiture($typeV)) {
			creerVoiture($typeV, $prix, $nb, $categorie, $moteur, $vitesse, $nbPlaces, $photo);
			$nexturl = "index.php?controle=loueur&action=accueil";
			header("Location:" . $nexturl);
		} else {
			require("vue/loueur/nouvelleVoitureStock.html");
		}
	}
}
function getfactures(){
	$nomC = isset($_POST['nom']) ? trim($_POST['nom']) : '';
	require ("modele/loueurBD.php");
	$factures = facture($nomC);
	require ("vue/loueur/facture.html");
}
?>
