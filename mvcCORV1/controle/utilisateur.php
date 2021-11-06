<?php
/*controleur utilisateur.php :
		fonctions-action de gestion des utilisateurs
	*/

function ident()
{
	$nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
	$pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	$mdp = isset($_POST['mdp']) ? trim($_POST['mdp']) : '';
	$_SESSION['msgCo'] = "";

	if (count($_POST) == 0) require("vue/utilisateur/pagep.html");
	else {
		require("./modele/utilisateurBD.php");
		if (verif_bd($email, $mdp, $profil)) {
			$_SESSION['profil'] = $profil;
			$_SESSION['pseudo'] = $profil['pseudo'];
			$nexturl = "index.php?controle=utilisateur&action=accueil";
			header("Location:" . $nexturl);
		} else {
			$_SESSION['msgCo'] = "Utilisateur inconnu !";
			$nexturl = "index.php?controle=voiture&action=voituresDisponible";
			header("Location:" . $nexturl);
		}
	}
}

function inscri()
{
	$nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
	$pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	$mdp = isset($_POST['mdp']) ? trim($_POST['mdp']) : '';
	$nomE = "";
	$adresseE = "";
	$_SESSION['msgIns'] = "";

	require("./modele/utilisateurBD.php");
	if (!verif_email($email, $profil)) {
		inscription($nom, $pseudo, $email, $mdp, $nomE, $adresseE);
		$_SESSION['profil']=$profil;
		$_SESSION['pseudo']=$pseudo;
		$nexturl = "index.php?controle=utilisateur&action=accueil";
		header("Location:" . $nexturl);

	} else {
		$_SESSION['msgIns'] = "Adresse mail déjà prise";
		$nexturl = "index.php?controle=voiture&action=voituresDisponible";
		header("Location:" . $nexturl);
	}
}

function deconnexion()
{
	$_SESSION['profil']="";
	header("Location:index.php");
}

function accueil()
{
	$nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
	$pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
	require("vue/utilisateur/accueil.html");
}

function mesVehicules()
{
	require("vue/utilisateur/mesVehicules.html");
}

function bye()
{
	echo ("<h2>Au revoir M. ou Mdme " . $_SESSION['profil']['nom'] . "</h2>");
	session_destroy();
}

function ajout_u()
{
	echo ("ajout_u ::");
}
function maj_u()
{
	echo ("maj_u ::");
}
function destr_u()
{
	echo ("destr_u ::");
}
