<?php
    function get_profil_by_email($email) 
    {
        require('./modeles/connect.php');
		
		try {
			$stmt = $pdo->prepare('SELECT `id_nom`, `nom`, `prenom`, `email` FROM `utilisateur` WHERE email=:email;');
            $stmt->bindParam('email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            $resultat = $stmt->fetchAll();
            
            if(count($resultat) > 0) 
                return result_to_array($resultat);
		} catch( PDOException $e ) {
			echo "Erreur SQL :", $e->getMessage();
		}

		return null;
    }

    function get_profil_by_id($id) 
    {
        require('./modeles/connect.php');
		
		try {
			$stmt = $pdo->prepare('SELECT `id_nom`, `nom`, `prenom`, `email` FROM `utilisateur` WHERE id_nom=:id_nom;');
            $stmt->bindParam('id_nom', $id, PDO::PARAM_STR);
            $stmt->execute();
            
            $resultat = $stmt->fetchAll();
            
            if(count($resultat) > 0) 
                return result_to_array($resultat);
		} catch( PDOException $e ) {
			echo "Erreur SQL :", $e->getMessage();
		}

		return null;
    }

    function result_to_array($resultat) 
    {
        $profil = array();
                
        $profil["id_nom"] = $resultat[0]['id_nom'];
        $profil["prenom"] = $resultat[0]['prenom'];
        $profil["nom"] = $resultat[0]['nom'];
        $profil["email"] = $resultat[0]['email'];
        $profil["role"] = $resultat[0]['role'];
        
        return $profil;
    }
?>