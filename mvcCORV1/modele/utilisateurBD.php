<?php

	function verif_bd($email,$mdp,&$profil) {
		require('modele/connectBD.php');
		$sql="SELECT * FROM `utilisateur` WHERE email=:email AND mdp=:mdp";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':email', $email);
			$commande->bindParam(':mdp', $mdp);
			$bool = $commande->execute();
			if ($bool) {
				$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
		}
		if (count($resultat) == 0) {
			$profil=array(); 
			return false; 
		}
		else {
			$profil = $resultat[0];
			return true;
		}
	}

	function verif_email($email,&$profil) {
		require('modele/connectBD.php');
		$sql="SELECT * FROM `utilisateur` WHERE email=:email";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':email', $email);
			$bool = $commande->execute();
			if ($bool) {
				$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); 
		}
		if (count($resultat) == 0) {
			$profil=array();
			return false; 
		}
		else {
			$profil = $resultat[0];
			return true;
		}
	}


	function inscription($nom,$pseudo,$email,$mdp,$nomE,$adresseE){
        require('modele/connectBD.php'); //$pdo est défini dans ce fichier
        $sql =('INSERT INTO `utilisateur` (`pseudo`, `nom`, `mdp`, `email`, `nomE`, `adresseE`) VALUES (:pseudo, :nom, :mdp, :email, :nomE, :adresseE);');
            try {
            $commande = $pdo->prepare($sql);
            $commande->bindParam(':nom', $nom);
            $commande->bindParam(':mdp', $mdp);
            $commande->bindParam(':pseudo', $pseudo);
            $commande->bindParam(':email', $email);
            $commande->bindParam(':nomE', $nomE);
            $commande->bindParam(':adresseE', $adresseE);
            $bool = $commande->execute();
            if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
            }
        }
        catch (PDOException $e) {
            echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
            die(); // On arrête tout.
        }
        if (count($resultat) == 0) {
            $profil=array(); // Pour qu'il y ait quand même quelque chose...
            return false; 
        }
        else {
            $profil = $resultat[0];
            return true;
        }
    }
?>