<?php 
	/*controleur utilisateur.php :
		fonctions-action de gestion des utilisateurs
	*/
	
	function identification () {
		$nom=isset($_POST['nom'])?trim($_POST['nom']):''; // trim pour enlever les espaces avant et apres
		$prenom=isset($_POST['prenom'])?trim($_POST['prenom']):'';
        $email=isset($_POST['email'])?trim($_POST['email']):'';
        $num=isset($_POST['num'])?trim($_POST['num']):'';
		$msg="";

        require ("./modele/utilisateurBD.php");
        if (!verif_bd($nom, $num, $profil)){
            inscription($nom,$prenom,$email,$num);
        } else{
            require("vue/utilisateur/identification.html");
        }
        
	}
    function pagep() {
        $nom=isset($_POST['nom'])?trim($_POST['nom']):''; // trim pour enlever les espaces avant et apres
		$prenom=isset($_POST['prenom'])?trim($_POST['prenom']):'';
        $email=isset($_POST['email'])?trim($_POST['email']):'';
        $num=isset($_POST['num'])?trim($_POST['num']):'';

        
		if (count($_POST)==0) require("vue/utilisateur/pagep.html");
		else {
			
			require ("./modele/utilisateurBD.php");
			
			if (verif_bd($nom, $num, $profil)) {
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