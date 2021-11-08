<?php

function verif_voiture($typeV)
{
	require('modele/connectBD.php');
	$sql = "SELECT * FROM `voiture` WHERE typeV=:typeV";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':typeV', $type);
		$bool = $commande->execute();
		if ($bool) {
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
		}
	} catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die();
	}
	if (count($resultat) == 0) {
		return false;
	} else {
		return true;
	}
}

function estUnLoueur()
{
	require("modele/connectBD.php");
	$sql = "SELECT idClient FROM `loueur` WHERE idClient=:idClient";

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
	} catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

function locations()
{
	require("modele/connectBD.php");
	$sql = "SELECT v.typeV, v.caract, v.photo, f.dateD, f.dateF, f.valeur, u.nom FROM facture f, voiture v, utilisateur u
			WHERE f.idVoiture = v.idVoiture AND f.idClient = u.idClient";
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

function stock()
{
	require("modele/connectBD.php");
	$sql = "SELECT v.idVoiture, v.typeV, v.prix, v.nb, v.caract, v.photo, v.etatLocation  FROM voiture v
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

function creerVoiture($typeV, $prix, $nb, $categorie, $moteur, $vitesse, $nbPlaces, $photo)
{
    require("modele/connectBD.php");
    $sql = ('INSERT INTO `voiture` (`typeV`, `prix`, `nb`, `caract`, `photo`) VALUES (:typeV, :prix, :nb, :caract, :photo)');
    try {
        $caract = '{"categorie" : "' . $categorie . '", "moteur" :"' . $moteur . '", "vitesse" :"' . $vitesse . '", "nbPlaces" :"'. $nbPlaces.'"}';
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':typeV', $typeV);
        $commande->bindParam(':prix', $prix);
        $commande->bindParam(':nb', $nb);
        $commande->bindParam(':caract', $caract);
        $commande->bindParam(':photo', $photo);
        $bool = $commande->execute();
    } catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout.
    }
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
	function facture($nomC){
		require("modele/connectBD.php");
		$sql = "SELECT SUM(f.valeur) AS valeur, u.nom, COUNT(f.IdFacture) AS nbFactures FROM facture f, utilisateur u 
		WHERE f.idClient = u.idClient	AND (SELECT MONTH(f.DateD) = :date) AND u.nom = :nomC";
		try {
			$dateJ = date('Y-m-d') ;
			$date = date_parse($dateJ);
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':nomC',  $nomC);
			$commande->bindParam(':date',  $date['month']);
			$bool = $commande->execute();
			$factures = array();
			if ($bool) {
				while ($c = $commande->fetch()) {
					$factures[] = $c; //stockage dans $C des enregistrements sélectionnés
				}
			}
		} catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
		return $factures;
	}
	
?>
