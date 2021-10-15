<?php
	function contacts() {
		require('./modeles/lire_profil.php');
		require('./modeles/lire_contacts.php');

		$profil = isset($_SESSION["profil"]) ? $_SESSION["profil"] : null;
	
		if($profil == null)
			header('Location: ./index.php?controle=utilisateur&action=authentification');
		
		if(isset($_POST["accueil"]))
			header('Location: ./index.php?controle=utilisateur&action=accueil');
	
		if(isset($_POST["disconnect"]))
			header('Location: ./index.php?controle=utilisateur&action=deconnecter');
	
		$id = isset($_GET["id"]) ? $_GET["id"] : null;
	
		if($id != null)
		{
			$utilisateur = get_profil_by_id($id);
			$contacts = read_contacts($utilisateur['id_nom']);
		}
		
		require('./vues/layout/layout.tpl');
	}

	return array('contacts');
?>

