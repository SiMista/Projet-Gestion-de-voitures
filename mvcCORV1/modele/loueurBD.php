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

?>