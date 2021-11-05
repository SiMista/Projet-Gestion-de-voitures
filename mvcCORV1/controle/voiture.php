<?php
    function mesVoitures(){
		require ("modele/voitureBD.php") ;
        $Voitures = voitures();
        require ("vue/utilisateur/mesVehicules.html");
    }
?>