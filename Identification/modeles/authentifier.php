<?php
    function authentifier($data) 
	{
		require('./modeles/connect.php');
		
		$stmt = $pdo->prepare('SELECT * FROM `utilisateur` WHERE email=:email AND num=:num;');
		$stmt->bindParam('email', $data['email'], PDO::PARAM_STR);
		$stmt->bindParam('num', $data['num'], PDO::PARAM_STR);
		$stmt->execute();
		
		$resultat = $stmt->fetchAll();
		
		if(count($resultat) > 0) 
		{
			require('./modeles/lire_profil.php');
			$_SESSION["profil"] = get_profil_by_email($data['email']);
			
			return true;
		}
		
		return false;
	}
?>