<?php
	function voitures() {
		require ("modele/connectBD.php") ; 
		$sql="SELECT v.type, v.nb, v.caract, v.photo, v.etatLocation, f.dateD, f.dateF  FROM facture f, voiture v
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
        $sql="SELECT v.idVoiture, v.type, v.nb, v.caract, v.photo, v.etatLocation  FROM voiture v
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

    function creerFacture($idV){
        require ("modele/connectBD.php");
        $sql =('INSERT INTO `facture` (`idClient`, `idVoiture`, `dateD`) VALUES (:idClient, :idVoiture, :dateD)');
        try {
            $date = date('y-m-d');
            $date = date_parse($c['dateD']);
            $array=array(1,3,5,7,9,11);
            if(in_array($date['month'],$array)){
                $array=array(1,3,5,7,9,);
                if(in_array($date['month'],$array))
                    $date['month'] = '0'.$date['month'] ;
                $dateF = '30/' . $date['month']. '/' .  $date['year'];
            }
            else {
                $array=array(4,6,8,10,12);
                if(in_array($date['month'],$array)){
                    $array=array(4,6,8);
                    if(in_array($date['month'],$array))
                        $date['month'] = '0'.$date['month'] ;
                    $dateF = '31/' . $date['month']. '/' .  $date['year'];
                }
                else {
                    if($date['month'] == 2){
                        if($date['year']%4 == 0){
                            $dateF = '29/0' . $date['month']. '/' .  $date['year'];
                        }
                        else{
                            $dateF = '28/0' . $date['month']. '/' .  $date['year'];
                        }
                    }
                }
            }
            $commande = $pdo->prepare($sql);
            $commande->bindParam(':idClient', $_SESSION['profil']['idClient']);
            $commande->bindParam(':idVoiture', $idV);
            $commande->bindParam(':dateD', $date);
            $bool = $commande->execute();
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
    }

    function louerVoiture($idV){
        require ("modele/connectBD.php") ;
        $sql=" UPDATE voiture SET nb = (SELECT v.nb FROM voiture v
        WHERE v.idVoiture = $idV) - 1 WHERE idVoiture = $idV";
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
    }
?>