<?php
/*controleur utilisateur.php :
		fonctions-action de gestion des utilisateurs
	*/

function pagep(){
	require("client.php");
	$VoituresDispo = voituresDisponible();
	require("vue/utilisateur/pagep.html");
}

function ident()
{
	$nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
	$pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	$mdp = isset($_POST['mdp']) ? trim($_POST['mdp']) : '';
	$_SESSION['msgCo'] = "";
	if (count($_POST) === 0) pagep();
	else {
		require("./modele/utilisateurBD.php");
		if (verif_bd($email, $mdp, $profil)) {
			$_SESSION['profil'] = $profil;
			$_SESSION['pseudo']=$profil['pseudo'];
			$nexturl = "index.php?controle=client&action=accueil";
			header("Location:" . $nexturl);
		} else {
			$_SESSION['msgCo'] = "Utilisateur inconnu !";
			$nexturl = "index.php";
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
		setcookie("cookieUser", $profil['idClient'], time()+36000);
		$nexturl = "index.php?controle=client&action=accueil";
		header("Location:" . $nexturl);

	} else {
		$_SESSION['msgIns'] = "Adresse mail déjà prise";
		$nexturl = "index.php";
		header("Location:" . $nexturl);
	}
}

function deconnexion()
{
	$_SESSION['profil']="";
	$nexturl = "index.php";
	header("Location:" . $nexturl);
}
?>