<?php

	function estUnLoueur(){
		require("modele/connectBD.php");
		$sql="SELECT idClient FROM `loueur` WHERE idClient=:idClient";

		try {
			$commande = $pdo->prepare($sql);
            $commande->bindParam(':idClient',  $_SESSION['profil']['idClient']);
			$bool = $commande->execute();

			if ($bool) {
				$c = $commande->fetch();
				if (isset($c[0])) {
                    return true;
                } else {
                    return false;
                }
			}
		}    
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
	}

	function locations() {
		require("modele/connectBD.php");
		$sql = "SELECT v.type, v.caract, v.photo, f.dateD, f.dateF, f.valeur  FROM facture f, voiture v
			WHERE f.idVoiture = v.idVoiture";
		try {
			$commande = $pdo->prepare($sql);
			$bool = $commande->execute();
			$Locations = array();
			if ($bool) {
				while ($c = $commande->fetch()) {
					$Locations[] = $c; //stockage dans $C des enregistrements sélectionnés
				}
			}
		} catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
		return $Locations;
	}

	function stock() {
		require("modele/connectBD.php");
		$sql = "SELECT v.idVoiture, v.type, v.prix, v.nb, v.caract, v.photo, v.etatLocation  FROM voiture v
			WHERE (v.etatLocation = 'disponible' OR v.etatLocation = 'en_revision') AND v.nb > 0";
		try {
			$commande = $pdo->prepare($sql);
			$bool = $commande->execute();
			$Voitures = array();
			if ($bool) {
				while ($c = $commande->fetch()) {
					$Voitures[] = $c; //stockage dans $C des enregistrements sélectionnés
				}
			}
		} catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
		return $Voitures;
	}

	function ajouter($idV)
	{
		require("modele/connectBD.php");
		$sql = " UPDATE voiture SET nb = (SELECT v.nb FROM voiture v
			WHERE v.idVoiture = $idV) + 1 WHERE idVoiture = $idV";
		try {
			$commande = $pdo->prepare($sql);
			$bool = $commande->execute();
		} catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
	}

	function retirer($idV)
	{
		require("modele/connectBD.php");
		$sql = " UPDATE voiture SET nb = (SELECT v.nb FROM voiture v
			WHERE v.idVoiture = $idV) - 1 WHERE idVoiture = $idV";
		try {
			$commande = $pdo->prepare($sql);
			$bool = $commande->execute();
		} catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
	}

?>