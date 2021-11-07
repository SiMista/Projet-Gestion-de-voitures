<?php

function voitures()
{
    require("modele/connectBD.php");
    $sql = "SELECT v.typeV, v.nb, v.caract, v.photo, v.etatLocation, f.dateD, f.dateF, f.valeur  FROM facture f, voiture v
		WHERE f.idClient=:idC AND f.idVoiture = v.idVoiture";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':idC', $_SESSION['profil']['idClient']);
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

function voituresDispo()
{
    require("modele/connectBD.php");
    $sql = "SELECT v.idVoiture, v.typeV, v.prix, v.nb, v.caract, v.photo, v.etatLocation  FROM voiture v
        WHERE v.etatLocation = 'disponible' AND v.nb > 0";
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

function calculerValeur($idV, $dateD, $dateF){
    require("modele/connectBD.php");
    $sql = "SELECT v.prix FROM voiture v
        WHERE v.idVoiture = $idV";
    try {
        $commande = $pdo->prepare($sql);
        $bool = $commande->execute();
        $valeur = 0;
        $dateD = date_parse($dateD);
        $dateF = date_parse($dateF);
        $nbJours = $dateF['day'] - $dateD['day'];
        if ($bool) {
            $c = $commande->fetch();
            $valeur = $c[0] * $nbJours;
        }
    }    
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout.
    }
    return $valeur;
}

function calculerDateFin($dateD) {
    $dateF = date_parse($dateD);
    $array = array(1, 3, 5, 7, 9, 11);

    if (in_array($dateF['month'], $array)) {
        $dateF = $dateF['year'] . '-' . $dateF['month'] . '-30';
    } else {
        $array = array(4, 6, 8, 10, 12);
        if (in_array($dateF['month'], $array)) {
            $dateF = $dateF['year'] . '-' . $dateF['month'] . '-31';
        } else {
            if ($dateF['month'] == 2) {
                if ($dateF['year'] % 4 == 0) {
                    $dateF = $dateF['year'] . '-' . $dateF['month'] . '-29';
                } else {
                    $dateF = $dateF['year'] . '-' . $dateF['month'] . '-28';
                }
            }
        }
    }
    return $dateF;
}

function creerFacture($idV, $dateF)
{
    require("modele/connectBD.php");
    $sql = ('INSERT INTO `facture` (`idClient`, `idVoiture`, `valeur`, `dateD`, `dateF`) VALUES (:idClient, :idVoiture, :valeur, :dateD, :dateF)');
    try {
        $dateD = date('y-m-d');
        if ($dateF == '')
            $dateF = calculerDateFin($dateD);
        $valeur = calculerValeur($idV, $dateD, $dateF);
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':idClient', $_SESSION['profil']['idClient']);
        $commande->bindParam(':idVoiture', $idV);
        $commande->bindParam(':valeur', $valeur);
        $commande->bindParam(':dateD', $dateD);
        $commande->bindParam(':dateF', $dateF);
        $bool = $commande->execute();
    } catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout.
    }
}

function louerVoiture($idV)
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

function mesClients(){
    require("modele/connectBD.php");
    $sql = "SELECT u.nom FROM utilisateur u";
    try {
        $commande = $pdo->prepare($sql);
        $bool = $commande->execute();
        $user = array();
        if ($bool) {
            while ($c = $commande->fetch()) {
                $user[] = $c; //stockage dans $C des enregistrements sélectionnés
            }
        }
    } catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout.
    }
    return $user;
}

