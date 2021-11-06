<?php
    function mesVoitures(){
		require ("modele/voitureBD.php") ;
        $Voitures = voitures();
        require ("vue/utilisateur/mesVehicules.html");
    }

    function voituresDisponible(){
        require ("modele/voitureBD.php") ;
        $VoituresDispo = voituresDispo();
        require ("vue/utilisateur/pagep.html");
    }
?>