<?php 
    function inscription() {
        require("./modeles/inscrire.php");

        $profil = récuperer_profil();

        if($profil != null)
            header('Location: ./index.php?controle=utilisateur&action=accueil');

        $keys = array('prenom', 'nom', 'num', 'email', 'role');
        $data = recuperer_données($keys);

        if(count($data) == count($keys))
        {
            if(inscrire($data)) {
                $res = "<style> #res { color: green; }</style>Inscription effectué avec succès.";
                header('Location: ./index.php?controle=utilisateur&action=accueil');
            }

            $res = "<style> #res { color: red; }</style>Erreur lors de l'inscription.<br>Vous avez peut-être déjà un compte avec ce mail.";
        }
        
        require('./vues/layout/layout.tpl');
    }

    function authentification() {
        require('./modeles/authentifier.php');

        $profil = récuperer_profil();

        if($profil != null)
            header('Location: ./index.php?controle=utilisateur&action=accueil');
    
        $keys = array('email', 'num');
        $data = recuperer_données($keys);
    
        if(count($data) == count($keys))
        {
            if(authentifier($data))
            {
                $res = "<style> #res { color: green; }</style>Authentifié avec succès.";
                header('Location: ./index.php?controle=utilisateur&action=accueil');
            }
            
            $res = "<style> #res { color: red; }</style>Identifiants invalides.";
        }
        
        require('./vues/layout/layout.tpl');
    }

    function accueil() {
        require('./modeles/lire_contacts.php');

        $profil = récuperer_profil();

        if($profil == null)
            header('Location: ./index.php?controle=utilisateur&action=authentification');
        
        if(isset($_POST["calcul"]))
            header('Location: ./../Calculatrice/operation.php');

        if(isset($_POST["contacts"]))
            header('Location: ./index.php?controle=contact&action=contacts&id=' . $_SESSION["profil"]["id_nom"]);

        if(isset($_POST["disconnect"])) 
            header('Location: ./index.php?controle=utilisateur&action=deconnecter');

        $contacts = read_contacts($_SESSION["profil"]["id_nom"]);
        
        require('./vues/layout/layout.tpl');
    }

    function deconnecter() {
        session_destroy(); 
        header('Location: ./index.php?controle=utilisateur&action=authentification');
    }

    function récuperer_profil() {
        return isset($_SESSION["profil"]) ? $_SESSION["profil"] : null; 
    }

    function recuperer_données($keys) {
        $data = array();

        foreach($keys as $key) 
            if(isset($_POST[$key])) {
                if($_POST[$key] == '')
                    echo '<style>#' . $key . '{ background-color: #FF7F7F; }</style>';
                else
                    $data[$key] = $_POST[$key];
            }	

        return $data;
    }

    return array('inscription', 'authentification', 'accueil', 'deconnecter');
?>