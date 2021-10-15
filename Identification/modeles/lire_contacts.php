<?php 
    function read_contacts($id_nom) 
	{
		require('./modeles/connect.php');
		
		$stmt = $pdo->prepare('SELECT `u`.`id_nom`, `nom`, `prenom`, `email`, `role`
			FROM contact c, utilisateur u 
			WHERE c.id_nom = :idu
			AND c.id_contact = u.id_nom
			LIMIT 0,30;');

		$stmt->bindParam(':idu', $id_nom, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
?>