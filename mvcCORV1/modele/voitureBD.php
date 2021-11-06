<?php
	function voitures() {
		require ("modele/connectBD.php") ; 
		$sql="SELECT v.type, v.nb, v.caract, v.photo, v.etatLocation  FROM facture f, voiture v
		WHERE f.idClient=:idC AND f.idVoiture = v.idVoiture
        LIMIT 0,30";
		try {
			$commande = $pdo->prepare($sql);
            $commande->bindParam(':idC', $_SESSION['profil']['idClient']);
			$bool = $commande->execute();
			$Voitures= array();
			if ($bool) {
				while ($c = $commande->fetch()) {
					$Voitures[] = $c; //stockage dans $C des enregistrements sélectionnés
				}	
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
		return $Voitures;
	}

	function voituresDispo(){
        require ("modele/connectBD.php") ; 
        $sql="SELECT v.type, v.nb, v.caract, v.photo, v.etatLocation  FROM voiture v
        WHERE v.etatLocation = 'disponible' AND v.nb != 0";
        try {
            $commande = $pdo->prepare($sql);
            $bool = $commande->execute();
            $Voitures= array();
            if ($bool) {
                while ($c = $commande->fetch()) {
                    $Voitures[] = $c; //stockage dans $C des enregistrements sélectionnés
                }
            }
        }
        catch (PDOException $e) {
            echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
            die(); // On arrête tout.
        }
        return $Voitures;
    }
?>