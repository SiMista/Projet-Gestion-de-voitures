<?php
/*controleur utilisateur.php :
		fonctions-action de gestion des utilisateurs
	*/

function pagep(){
	require("client.php");
	$VoituresDispo = voituresDisponible();
	require("vue/pagep.tpl");
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
		require("./modele/loueurBD.php");
		if (verif_bd($email, sha1($mdp), $profil)) {
			$_SESSION['profil'] = $profil;
			$_SESSION['pseudo']=$profil['pseudo'];
			if(estUnLoueur()) {
				$nexturl = "index.php?controle=loueur&action=accueil";
			} else {
			$nexturl = "index.php?controle=client&action=accueil";
			}
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
	$nomE = isset($_POST['nomE']) ? trim($_POST['nomE']) : '';
	$adresseE = isset($_POST['adresseE']) ? trim($_POST['adresseE']) : '';
	$_SESSION['msgIns'] = "";

	require("./modele/utilisateurBD.php");
	if (!verif_email($email, $profil)) {
		inscription($nom, $pseudo, $email, sha1($mdp), $nomE, $adresseE);
		if (verif_bd($email, sha1($mdp), $profil)) {
			$_SESSION['pseudo']=$pseudo;
			$_SESSION['profil']=$profil;
			setcookie("cookieUser", $profil['idClient'], time()+36000);
			$nexturl = "index.php?controle=client&action=accueil";
			header("Location:" . $nexturl);
		}
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