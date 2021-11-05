<?php 
	/*controleur utilisateur.php :
		fonctions-action de gestion des utilisateurs
	*/
	
	function identification() {
		$nom=isset($_POST['nom'])?trim($_POST['nom']):''; 
		$pseudo=isset($_POST['pseudo'])?trim($_POST['pseudo']):'';
        $email=isset($_POST['email'])?trim($_POST['email']):'';
        $mdp=isset($_POST['mdp'])?trim($_POST['mdp']):'';
		$msg="";

		if (count($_POST)==0) require("vue/utilisateur/pagep.html");
		else {
        	require ("./modele/utilisateurBD.php");
			if(verif_bd($email, $mdp, $profil)){
        		if (verif_email($email, $profil)){
					inscription($nom,$mdp,$pseudo,$email);
					$_SESSION['profil'] = $profil;
					$nexturl = "index.php?controle=utilisateur&action=accueil";
					header ("Location:" . $nexturl);
				} 
				else {
				echo "Adresse mail déjà utilisée";
				require("vue/utilisateur/pagep.html");
				}	
        	}
			else {
				require("vue/utilisateur/pagep.html");
			}
		}
	}

    function pagep() {
        $email=isset($_POST['email'])?trim($_POST['email']):'';
        $mdp=isset($_POST['mdp'])?trim($_POST['mdp']):'';

        
		if (count($_POST)==0) require("vue/utilisateur/pagep.html");
		else {
			
			require ("./modele/utilisateurBD.php");
			
			if (verif_bd($email, $mdp, $profil)) {
				//echo ('<br/>PROFIL : <pre>'); var_dump ($profil); echo ('</pre><br/>'); die("ident");
				
				//session_start(); //deja fait dans index
				$_SESSION['profil'] = $profil;
				$nexturl = "index.php?controle=utilisateur&action=accueil";
				header ("Location:" . $nexturl);
			}
			else {
				$msg = "Utilisateur inconnu !";
				require("vue/utilisateur/pagep.html");
			}
		}
		
	}